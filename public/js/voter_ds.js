
  const votingResultsChart = new Chart(document.getElementById('votingResultsChart'), {
    type: 'pie',
    data: {
      labels: ['Kandidat A', 'Kandidat B'],
      datasets: [{
        data: [60, 40],
        backgroundColor: ['#3498db', '#2ecc71']
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });
  