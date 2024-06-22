// Sample data for Marital Status Chart
const maritalStatusData = {
    labels: ['Married', 'Unmarried'],
    datasets: [{
        label: 'Marital Status',
        data: [120, 80], // Example data
        backgroundColor: ['#FF6384', '#36A2EB'],
        hoverOffset: 4
    }]
};

const maritalStatusConfig = {
    type: 'doughnut',
    data: maritalStatusData,
};

const maritalStatusChart = new Chart(
    document.getElementById('maritalStatusChart'),
    maritalStatusConfig
);

// Sample data for Age Distribution Chart
const ageDistributionData = {
    labels: ['0-18', '19-35', '36-50', '51-65', '66+'],
    datasets: [{
        label: 'Age Distribution',
        data: [50, 150, 100, 70, 30], // Example data
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
    }]
};

const ageDistributionConfig = {
    type: 'bar',
    data: ageDistributionData,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

const ageDistributionChart = new Chart(
    document.getElementById('ageDistributionChart'),
    ageDistributionConfig
);

// Sample data for Gender Chart
const genderData = {
    labels: ['Male', 'Female'],
    datasets: [{
        label: 'Gender',
        data: [130, 170], // Example data
        backgroundColor: ['#FF6384', '#36A2EB'],
        hoverOffset: 4
    }]
};

const genderConfig = {
    type: 'pie',
    data: genderData,
};

const genderChart = new Chart(
    document.getElementById('genderChart'),
    genderConfig
);
