const hospitals = {
    "Dhaka": [
        {
            name: "National Heart Foundation Hospital & Research Institute",
            address: "Mirpur-2, Dhaka",
            img: "/images/national.jpeg"
        },
        {
            name: "United Hospital",
            address: "Gulshan-2, Dhaka",
            img: "/images/united.jpeg"
        },
        {
            name: "Square Hospital",
            address: "Panthapath, Dhaka",
            img: "/images/Square Hospitals Ltd..png"
        },
        {
            name: "Ibrahim Cardiac Hospital & Research Institute",
            address: "Shahbagh, Dhaka",
            img: "/images/Ibrahim Cardiac Hospital & Research Institute.jpg"
        },
        {
            name: "Bangladesh Institute of Research and Rehabilitation in Diabetes, Endocrine and Metabolic Disorders (BIRDEM)",
            address: "Shahbagh, Dhaka",
            img: "/images/BIRDEM-General-Hospital-1000x563.jpg"
        },
        {
            name: "Apollo Hospitals Dhaka (Evercare Hospital)",
            address: "Bashundhara Residential Area, Dhaka",
            img: "/images/apollo.jpeg"
        },
        {
            name: "Labaid Cardiac Hospital",
            address: "Dhanmondi, Dhaka",
            img: "/images/labaid.jpeg"
        }
    ],
    "Chattogram": [
        {
            name: "Chattogram Metropolitan Hospital",
            address: "Panchlaish, Chattogram",
            img: "path/to/metropolitan-hospital.jpg"
        },
        {
            name: "Chattogram Medical College Hospital",
            address: "K.B. Fazlul Kader Road, Chattogram",
            img: "path/to/medical-college.jpg"
        },
        {
            name: "Royal Hospital and Research Center",
            address: "OR Nizam Road, Chattogram",
            img: "path/to/royal-hospital.jpg"
        }
    ],
    "Khulna": [
        {
            name: "Khulna Medical College Hospital",
            address: "Shamsur Rahman Road, Khulna",
            img: "path/to/khulna-medical.jpg"
        },
        {
            name: "Gazi Medical College Hospital",
            address: "A. Hamid Road, Khulna",
            img: "path/to/gazi-medical.jpg"
        }
    ],
    "Rajshahi": [
        {
            name: "Rajshahi Medical College Hospital",
            address: "Medical College Road, Rajshahi",
            img: "path/to/rajshahi-medical.jpg"
        },
        {
            name: "Islami Bank Medical College Hospital",
            address: "Nawdapara, Rajshahi",
            img: "path/to/islami-bank-medical.jpg"
        }
    ],
    "Sylhet": [
        {
            name: "Sylhet MAG Osmani Medical College Hospital",
            address: "East Mirabazar, Sylhet",
            img: "path/to/osmani-medical.jpg"
        },
        {
            name: "Al Haramain Hospital",
            address: "Dargah Gate, Sylhet",
            img: "path/to/al-haramain.jpg"
        }
    ],
    "Barishal": [
        {
            name: "Sher-e-Bangla Medical College Hospital",
            address: "Band Road, Barishal",
            img: "path/to/sher-e-bangla.jpg"
        }
    ],
    "Rangpur": [
        {
            name: "Rangpur Medical College Hospital",
            address: "Dhap, Rangpur",
            img: "path/to/rangpur-medical.jpg"
        },
        {
            name: "Prime Medical College Hospital",
            address: "Pirgacha Road, Rangpur",
            img: "path/to/prime-medical.jpg"
        }
    ]
};

function showHospitals() {
    const city = document.getElementById('city').value;
    const hospitalContainer = document.getElementById('hospitals');
    hospitalContainer.innerHTML = '';

    if (city && hospitals[city]) {
        hospitals[city].forEach(hospital => {
            const hospitalCard = document.createElement('div');
            hospitalCard.className = 'hospital-card';
            hospitalCard.innerHTML = `
                <img src="${hospital.img}" alt="${hospital.name}">
                <h3>${hospital.name}</h3>
                <p>${hospital.address}</p>
            `;
            hospitalContainer.appendChild(hospitalCard);
        });
    }
}
