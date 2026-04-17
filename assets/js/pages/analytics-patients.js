const palette = ['#0D47A1','#E53935','#00ACC1','#43A047','#FB8C00','#8E24AA','#6D4C41','#546E7A'];

new Chart(document.getElementById('genderChart'), {
  type: 'pie',
  data: {
    labels: ['Male', 'Female', 'Other'],
    datasets: [{ data: [520, 495, 25], backgroundColor: ['#0D47A1','#E53935','#FB8C00'], hoverOffset: 6 }]
  },
  options: { plugins: { legend: { position: 'bottom' } }, maintainAspectRatio: true }
});

new Chart(document.getElementById('maritalChart'), {
  type: 'doughnut',
  data: {
    labels: ['Married', 'Single', 'Widowed', 'Divorced'],
    datasets: [{ data: [620, 310, 75, 35], backgroundColor: ['#0D47A1','#00ACC1','#E53935','#FB8C00'], hoverOffset: 6 }]
  },
  options: { plugins: { legend: { position: 'bottom' } }, maintainAspectRatio: true }
});

new Chart(document.getElementById('ageChart'), {
  type: 'bar',
  data: {
    labels: ['0–18', '19–30', '31–45', '46–60', '61–70', '71+'],
    datasets: [{
      label: 'Patients',
      data: [35, 95, 210, 380, 215, 105],
      backgroundColor: '#0D47A1',
      borderRadius: 6,
    }]
  },
  options: {
    plugins: { legend: { display: false } },
    scales: {
      y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { precision: 0 } },
      x: { grid: { display: false } }
    }
  }
});

new Chart(document.getElementById('bloodGroupChart'), {
  type: 'bar',
  data: {
    labels: ['A+','A-','B+','B-','O+','O-','AB+','AB-'],
    datasets: [{
      label: 'Patients',
      data: [210, 45, 195, 38, 310, 62, 120, 60],
      backgroundColor: palette,
      borderRadius: 6,
    }]
  },
  options: {
    plugins: { legend: { display: false } },
    scales: {
      y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { precision: 0 } },
      x: { grid: { display: false } }
    }
  }
});
