const recommendations = {
    hypertension: ['ACE inhibitors', 'Beta-blockers', 'Calcium channel blockers', 'Diuretics'],
    cad: ['Statins', 'Aspirin', 'Beta-blockers', 'Nitroglycerin'],
    heartFailure: ['ACE inhibitors', 'Beta-blockers', 'Diuretics', 'Aldosterone antagonists'],
    arrhythmia: ['Antiarrhythmic drugs', 'Beta-blockers', 'Calcium channel blockers', 'Anticoagulants'],
    valvular: ['Diuretics', 'Anticoagulants', 'Beta-blockers', 'ACE inhibitors'],
    congenital: ['Diuretics', 'Beta-blockers', 'ACE inhibitors', 'Prostaglandins'],
    cardiomyopathy: ['Beta-blockers', 'ACE inhibitors', 'Diuretics', 'Anticoagulants'],
    pericarditis: ['NSAIDs', 'Corticosteroids', 'Colchicine', 'Antibiotics (if bacterial)'],
    endocarditis: ['Antibiotics', 'Antifungal medications (if fungal)', 'Surgery (in severe cases)'],
    pulmonaryHypertension: ['Endothelin receptor antagonists', 'Phosphodiesterase-5 inhibitors', 'Prostacyclin analogs', 'Calcium channel blockers']
};
document.addEventListener('DOMContentLoaded', function() {
    alert("Please make sure to consult a physician before starting any medication. We are not responsible for any side effects.");
});


function showRecommendations() {
    const diseaseSelect = document.getElementById('disease');
    const selectedDisease = diseaseSelect.value;
    const recommendationsSection = document.getElementById('recommendations');

    recommendationsSection.innerHTML = '';

    if (selectedDisease) {
        const meds = recommendations[selectedDisease];
        const ul = document.createElement('ul');
        meds.forEach(med => {
            const li = document.createElement('li');
            li.textContent = med;
            ul.appendChild(li);
        });

        recommendationsSection.appendChild(ul);
    }
}
