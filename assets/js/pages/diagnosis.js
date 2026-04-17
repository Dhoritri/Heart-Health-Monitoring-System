const chartData = {
  hypertension:         { label:'Hypertension', data:[12,19,3,5,2,3],  color:'#FF6384' },
  cad:                  { label:'Coronary Artery Disease', data:[22,29,5,5,20,3], color:'#36A2EB' },
  heartFailure:         { label:'Heart Failure', data:[18,12,6,9,7,4],  color:'#4BC0C0' },
  arrhythmia:           { label:'Arrhythmia', data:[9,15,8,12,6,10],    color:'#9966FF' },
  valvularHeartDisease: { label:'Valvular Disease', data:[5,8,13,7,3,6], color:'#FF9F40' },
  congenitalHeartDisease:{ label:'Congenital HD', data:[4,5,6,5,4,5],   color:'#FFCD56' },
  cardiomyopathy:       { label:'Cardiomyopathy', data:[7,14,10,8,12,6], color:'#4BC0C0' },
  pericarditis:         { label:'Pericarditis', data:[2,3,4,2,3,1],      color:'#36A2EB' },
  endocarditis:         { label:'Endocarditis', data:[1,2,1,3,2,1],      color:'#9966FF' },
  pulmonaryHypertension:{ label:'Pulmonary Hypertension', data:[5,7,8,6,7,5], color:'#FF9F40' }
};

const months = ['Jan','Feb','Mar','Apr','May','Jun'];

const ctx = document.getElementById('diagnosisChart').getContext('2d');
let chart;

function buildChart(key) {
  const d = chartData[key];
  if (!d) return;

  if (chart) chart.destroy();

  chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        label: d.label + ' Cases',
        data: d.data,
        backgroundColor: d.color + '22',
        borderColor: d.color,
        borderWidth: 2.5,
        pointBackgroundColor: d.color,
        pointRadius: 5,
        pointHoverRadius: 7,
        fill: true,
        tension: 0.4,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: { display: false },
        tooltip: { mode: 'index', intersect: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: { color: 'rgba(0,0,0,0.05)' },
          ticks: { precision: 0 }
        },
        x: { grid: { display: false } }
      }
    }
  });

  // Update stats
  const total = d.data.reduce((a,b) => a+b, 0);
  const peak  = Math.max(...d.data);
  document.getElementById('statTotal').textContent = total;
  document.getElementById('statPeak').textContent  = peak;
  document.getElementById('statAvg').textContent   = (total / d.data.length).toFixed(1);
  document.getElementById('chartTitle').textContent = `${d.label} — Monthly Cases (Jan–Jun)`;
}

document.querySelectorAll('.condition-item').forEach(item => {
  item.addEventListener('click', () => {
    document.querySelectorAll('.condition-item').forEach(i => i.classList.remove('active'));
    item.classList.add('active');
    buildChart(item.dataset.condition);
  });
});

buildChart('hypertension');
