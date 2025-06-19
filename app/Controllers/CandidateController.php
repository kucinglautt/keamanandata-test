<?php

namespace App\Controllers;
use App\Models\VoteModel;
use App\Models\CandidateModel;

class  CandidateController extends BaseController
{
    protected $candidateModel;

    public function __construct()
    {
        $this->candidateModel = new CandidateModel();
    }

    public function index()
    {
        $model = new CandidateModel();
        $data['candidates'] = $model->findAll(); // Mengambil semua kandidat
        // Debugging line
        log_message('info', 'Index method called, candidates retrieved: ' . print_r($data['candidates'], true));
        return view('candidates/index', $data); // Ganti dengan nama view yang sesuai
    }


    public function create(){
        return view('admin\create_candidate.php');
    }

    public function candidateList(){
        $model = new CandidateModel();
        $data['candidates'] = $model->findAll(); // Mengambil semua kandidat
        // Debugging line
        log_message('info', 'Index method called, candidates retrieved: ' . print_r($data['candidates'], true));
        return view('admin/candidate_list', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'bio' => 'required',
            'photo' => 'uploaded[photo]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $photo = $this->request->getFile('photo');
        $photoName = $photo->getRandomName();
        $photo->move('uploads/', $photoName);

        $this->candidateModel->save([
            'nama' => $this->request->getPost('nama'),
            'bio' => $this->request->getPost('bio'),
            'photo' => $photoName,
            'vote' => 0
        ]);

        return redirect()->to('admin/candidate_list')->with('success', 'Candidate created successfully.');
    }

    public function edit($id)
    {
        $candidate = $this->candidateModel->find($id);
        
        if (!$candidate) {
            session()->setFlashdata('error', 'Candidate not found.');
            return redirect()->to('admin/candidate_list');
        }

        log_message('info', 'Edit method called, candidate retrieved: ' . print_r($candidate, true));
        return view('admin/candidate_edit', ['candidate' => $candidate]);
    }

    // Handle the form submission and update candidate data
    public function update($id)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'bio' => $this->request->getPost('bio'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            $photo->move('uploads/', $photoName);
            $data['photo'] = $photoName;
        }

        // Update the candidate with the given ID
        $this->candidateModel->update($id, $data);

        return redirect()->to('admin/candidate_list')->with('success', 'Candidate updated successfully.');
    }
    public function vote($id) {
        $userId = session()->get('user_id');
        log_message('debug', 'User  ID: ' . $userId); // Log the user ID for debugging
    
        if (!$userId) {
            return redirect()->to('Login/login')->with('error', 'You must be logged in to vote.');
        }
    
        // Check if the user has already voted for any candidate
        $voteModel = new VoteModel();
        $existingVote = $voteModel->where('user_id', $userId)->first();
    
        if ($existingVote) {
            return redirect()->to('/user/index')->with('error', 'You have already voted. You cannot vote for another candidate.');
        }
    
        // Proceed with the voting process
        $voteType = 1; // Example: 1 for upvote
        $model = new CandidateModel();
        $candidate = $model->find($id);
    
        if ($candidate) {
            // Increment the vote count for the candidate
            $candidate['vote'] += 1; // Ensure you are updating the correct field
            $model->update($id, $candidate);
    
            // Save the new vote to the votes table
            $data = [
                'user_id' => $userId,
                'kadidat_id' => $id, // Ensure this is the correct column name
                'vote_type' => $voteType,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $voteModel->insert($data);
    
            // Check user role
            $session = session();
            $userRole = $session->get('role'); // Assuming you store user role in session
    
            if ($userRole === 'Admin') {
                return redirect()->to('candidates/index')->with('message', 'Vote successfully cast!');
            } else {
                return redirect()->to('candidates/indexx')->with('message', 'Vote successfully cast!');
            }
        } else {
            return redirect()->to('candidates/index')->with('error', 'Candidate not found.');
        }
    }


    public function delete($id)
    {
        $this->candidateModel->delete($id);
        return redirect()->to('admin/candidate_list')->with('success', 'Candidate deleted successfully.');
    }
}
