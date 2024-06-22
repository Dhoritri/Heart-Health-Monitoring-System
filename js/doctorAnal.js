document.addEventListener('DOMContentLoaded', () => {
    const priceBarChart = document.getElementById('price-bar-chart');
    const experienceHistogram = document.getElementById('experience-histogram');
    const priceVsExperienceScatter = document.getElementById('price-vs-experience-scatter');

    const data = [
        { name: 'Dr. A', specialization: 'Cardiology', price: 200, experience: 10 },
        { name: 'Dr. B', specialization: 'Neurology', price: 150, experience: 5 },
        { name: 'Dr. C', specialization: 'Pediatrics', price: 300, experience: 20 },
        { name: 'Dr. D', specialization: 'Orthopedics', price: 250, experience: 15 }
    ];

    const priceData = data.map(d => d.price);
    const experienceData = data.map(d => d.experience);
    const specializations = [...new Set(data.map(d => d.specialization))];

    const priceBarTrace = {
        x: specializations,
        y: specializations.map(s => data.filter(d => d.specialization === s).length),
        type: 'bar'
    };

    const experienceHistogramTrace = {
        x: experienceData,
        type: 'histogram',
        nbinsx: 6
    };

    const priceVsExperienceScatterTrace = {
        x: experienceData,
        y: priceData,
        mode: 'markers',
        type: 'scatter'
    };

    Plotly.newPlot(priceBarChart, [priceBarTrace], { title: 'Doctors\' Price Distribution' });
    Plotly.newPlot(experienceHistogram, [experienceHistogramTrace], { title: 'Years of Experience Distribution' });
    Plotly.newPlot(priceVsExperienceScatter, [priceVsExperienceScatterTrace], { title: 'Price vs. Years of Experience' });

    const priceRangeInput = document.getElementById('price-range');
    const experienceRangeInput = document.getElementById('experience-range');

    priceRangeInput.addEventListener('input', () => {
        document.getElementById('price-range-value').textContent = `0 - ${priceRangeInput.value}`;
        updateOverview();
    });

    experienceRangeInput.addEventListener('input', () => {
        document.getElementById('experience-range-value').textContent = `0 - ${experienceRangeInput.value}`;
        updateOverview();
    });

    function updateOverview() {
        const filteredData = data.filter(d => d.price <= priceRangeInput.value && d.experience <= experienceRangeInput.value);
        const totalDoctors = filteredData.length;
        const averagePrice = (filteredData.reduce((sum, d) => sum + d.price, 0) / totalDoctors).toFixed(2);
        const averageExperience = (filteredData.reduce((sum, d) => sum + d.experience, 0) / totalDoctors).toFixed(2);

        document.getElementById('total-doctors').textContent = totalDoctors;
        document.getElementById('average-price').textContent = `${averagePrice}`;
        document.getElementById('average-experience').textContent = averageExperience;
    }
});
