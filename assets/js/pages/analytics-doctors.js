const palette = ['#0D47A1','#E53935','#00ACC1','#43A047','#FB8C00','#8E24AA','#6D4C41','#546E7A','#F06292','#26C6DA','#D4E157','#FF7043'];

new Chart(document.getElementById('specChart'), {
  type: 'bar',
  data: {
    labels: ['Cardiology','Interventional Cardiology','Cardiac Surgery','Electrophysiology','Heart Failure','Vascular Surgery','Internal Medicine','Emergency Medicine','Anesthesiology','Pediatric Cardiology','Nuclear Cardiology','Rehabilitation'],
    datasets: [{
      label: 'Physicians',
      data: [38, 22, 18, 14, 12, 10, 9, 7, 5, 3, 1, 1],
      backgroundColor: palette,
      borderRadius: 6,
    }]
  },
  options: {
    indexAxis: 'y',
    plugins: { legend: { display: false } },
    scales: {
      x: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { precision: 0 } },
      y: { grid: { display: false } }
    }
  }
});

new Chart(document.getElementById('expChart'), {
  type: 'bar',
  data: {
    labels: ['1–5 yrs', '6–10 yrs', '11–15 yrs', '16–20 yrs', '21–25 yrs', '25+ yrs'],
    datasets: [{
      label: 'Doctors',
      data: [18, 32, 45, 28, 12, 5],
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

new Chart(document.getElementById('docGenderChart'), {
  type: 'doughnut',
  data: {
    labels: ['Male', 'Female'],
    datasets: [{ data: [88, 52], backgroundColor: ['#0D47A1','#E53935'], hoverOffset: 6 }]
  },
  options: { plugins: { legend: { position: 'bottom' } }, maintainAspectRatio: true }
});

new Chart(document.getElementById('apptChart'), {
  type: 'line',
  data: {
    labels: ['Jan','Feb','Mar','Apr','May','Jun'],
    datasets: [
      { label:'Cardiology', data:[420,385,470,500,460,510], borderColor:'#0D47A1', tension:.4, fill:false, pointRadius:4 },
      { label:'Cardiac Surgery', data:[120,135,110,145,130,160], borderColor:'#E53935', tension:.4, fill:false, pointRadius:4 },
      { label:'Interventional', data:[200,215,195,230,220,245], borderColor:'#00ACC1', tension:.4, fill:false, pointRadius:4 },
    ]
  },
  options: {
    plugins: { legend: { position: 'bottom' } },
    scales: {
      y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } },
      x: { grid: { display: false } }
    }
  }
});
