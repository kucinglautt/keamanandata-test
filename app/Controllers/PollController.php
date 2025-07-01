<?php

namespace App\Controllers;

use App\Models\PollModel;
use App\Models\CandidateModel;
use App\Models\VoteModel;
use CodeIgniter\RESTful\ResourceController;

class PollController extends ResourceController
{
    protected $pollModel;
    protected $candidateModel;
    protected $voteModel;

    public function __construct()
    {
        $this->pollModel = new PollModel();
        $this->candidateModel = new CandidateModel();
        $this->voteModel = new VoteModel();
    }

    public function index()
    {
        $polls = $this->pollModel->getPolls();
        return $this->respond($polls);
    }

    public function show($id = null)
    {
        $poll = $this->pollModel->getPoll($id);
        if (!$poll) {
            return $this->failNotFound('Poll not found');
        }

        $kadidat = $this->candidateModel->getKadidat($id);
        return $this->respond(['poll' => $poll, 'kadidat' => $kadidat]);
    }

    public function vote()
    {
        $userId = $this->request->getPost('user_id');
        $kadidatId = $this->request->getPost('kadidat_id');

               // Cek apakah pengguna sudah memberikan suara
               if ($this->voteModel->getVotesByUser ($userId)) {
                return $this->fail('User  has already voted');
            }
    
            // Simpan suara
            $this->voteModel->createVote(['user_id' => $userId, 'kadidat_id' => $kadidatId]);
    
            // Update jumlah suara untuk kandidat
            $kadidat = $this->candidateModel->find($kadidatId);
            if ($kadidat) {
                $kadidat->vote += 1;
                $this->candidateModel->updateVote($kadidatId, $kadidat->vote);
            }
    
            return $this->respond(['message' => 'Vote recorded']);
        }

        public function create()
        {
            return view('admin/create_poll');
        }

        public function store()
        {
            $question = $this->request->getPost('question');

            // Simpan polling ke database
            $this->pollModel->insert(['question' => $question]);

            return redirect()->to(base_url('polls/view'));
        }

        public function viewPolls()
        {
            $polls = $this->pollModel->getPolls();
            foreach ($polls as &$poll) {
                $poll['kadidats'] = $this->candidateModel->getKadidats($poll['id']);
            }
            return view('polls_view', ['polls' => $polls]);
        }
    }