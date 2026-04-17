const recommendations = {
  hypertension:          ['ACE Inhibitors', 'Beta-blockers', 'Calcium Channel Blockers', 'Diuretics'],
  cad:                   ['Statins', 'Aspirin', 'Beta-blockers', 'Nitroglycerin'],
  heartFailure:          ['ACE Inhibitors', 'Beta-blockers', 'Diuretics', 'Aldosterone Antagonists'],
  arrhythmia:            ['Antiarrhythmic Drugs', 'Beta-blockers', 'Calcium Channel Blockers', 'Anticoagulants'],
  valvular:              ['Diuretics', 'Anticoagulants', 'Beta-blockers', 'ACE Inhibitors'],
  congenital:            ['Diuretics', 'Beta-blockers', 'ACE Inhibitors', 'Prostaglandins'],
  cardiomyopathy:        ['Beta-blockers', 'ACE Inhibitors', 'Diuretics', 'Anticoagulants'],
  pericarditis:          ['NSAIDs', 'Corticosteroids', 'Colchicine', 'Antibiotics (if bacterial)'],
  endocarditis:          ['Antibiotics', 'Antifungal Medications (if fungal)', 'IV Antibiotics', 'Surgical consult'],
  pulmonaryHypertension: ['Endothelin Receptor Antagonists', 'PDE-5 Inhibitors', 'Prostacyclin Analogs', 'Calcium Channel Blockers']
};

const conditionLabels = {
  hypertension:          'Hypertension',
  cad:                   'Coronary Artery Disease',
  heartFailure:          'Heart Failure',
  arrhythmia:            'Arrhythmia',
  valvular:              'Valvular Heart Disease',
  congenital:            'Congenital Heart Disease',
  cardiomyopathy:        'Cardiomyopathy',
  pericarditis:          'Pericarditis',
  endocarditis:          'Endocarditis',
  pulmonaryHypertension: 'Pulmonary Hypertension'
};

document.getElementById('conditionGrid').addEventListener('click', e => {
  const btn = e.target.closest('.condition-btn');
  if (!btn) return;

  document.querySelectorAll('.condition-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');

  const key   = btn.dataset.condition;
  const meds  = recommendations[key] || [];
  const label = conditionLabels[key] || key;

  document.getElementById('resultCondition').textContent = label;

  const list = document.getElementById('medsList');
  list.innerHTML = meds.map(m => `
    <div class="med-item">
      <div class="med-item__icon"><i class="fas fa-capsules"></i></div>
      <div class="med-item__name">${m}</div>
    </div>
  `).join('');

  const result = document.getElementById('medsResult');
  result.classList.add('visible');
  result.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
});
