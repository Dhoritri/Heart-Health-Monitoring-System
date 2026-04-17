const hospitals = {
  "Dhaka": [
    { name:"National Heart Foundation Hospital & Research Institute", address:"Mirpur-2, Dhaka", img:"national.jpeg", website:"https://www.nhf.org.bd/" },
    { name:"United Hospital", address:"Gulshan-2, Dhaka", img:"united.jpeg", website:"https://www.uhlbd.com/" },
    { name:"Square Hospital", address:"Panthapath, Dhaka", img:"Square Hospitals Ltd..png", website:"https://www.squarehospital.com/" },
    { name:"Ibrahim Cardiac Hospital & Research Institute", address:"Shahbagh, Dhaka", img:"Ibrahim Cardiac Hospital & Research Institute.jpg", website:"https://ibrahimcardiac.org.bd/" },
    { name:"BIRDEM General Hospital", address:"Shahbagh, Dhaka", img:"BIRDEM-General-Hospital-1000x563.jpg", website:"https://www.birdembd.org/" },
    { name:"Apollo Hospitals Dhaka (Evercare)", address:"Bashundhara, Dhaka", img:"apollo.jpeg", website:"https://www.evercarebd.com/" },
    { name:"Labaid Cardiac Hospital", address:"Dhanmondi, Dhaka", img:"labaid.jpeg", website:"https://labaidgroup.com/cardiac" }
  ],
  "Chattogram": [
    { name:"Chattogram Metropolitan Hospital", address:"Panchlaish, Chattogram", img:"chattogram metropolitan hospital.jpg", website:"https://ctgmhpl.com/" },
    { name:"Chattogram Medical College Hospital", address:"K.B. Fazlul Kader Rd, Chattogram", img:"Chattogram Medical College Hospital.jpg", website:"https://cmc.gov.bd/" },
    { name:"Chittagong General Hospital", address:"Andarkilla Rd, Chattogram 4000", img:"Chittagong General Hospital.jpg", website:"" },
    { name:"Royal Hospital (Pvt.) Limited", address:"O.R. Nizam Rd, Chattogram", img:"Royal Hospital (Pvt.) Limited.jpg", website:"" },
    { name:"Evercare Hospital Chattogram", address:"O.R. Nizam Rd, Chattogram", img:"Evercare Hospital Chattogram.jpg", website:"https://www.evercarebd.com/chattogram/" },
    { name:"Max Hospital and Diagnostics", address:"O.R. Nizam Rd, Chattogram", img:"", website:"https://maxhospitalbd.com/" }
  ],
  "Khulna": [
    { name:"Khulna Medical College Hospital", address:"Shamsur Rahman Road, Khulna", img:"Khulna Medical College Hospital.jpg", website:"https://kmc.gov.bd/" },
    { name:"Gazi Medical College Hospital", address:"A. Hamid Road, Khulna", img:"Gazi Medical College Hospital.jpg", website:"https://www.gmc.edu.bd/" },
    { name:"Khulna City Medical College Hospital", address:"KDA Ave, Khulna 9100", img:"Khulna City Medical College Hospital.jpg", website:"https://kcmc.edu.bd/" },
    { name:"Khanjahan Ali Hospital", address:"H3 KDA Ave, Khulna 9100", img:"Khanjahan Ali Hospital.jpg", website:"" }
  ],
  "Rajshahi": [
    { name:"Rajshahi Metropolitan Hospital", address:"C & B More, Greater Rd, Rajshahi 6000", img:"Rajshahi Metropolitan Hospital.jpg", website:"" },
    { name:"Kaisar Memorial Hospital", address:"Cantonment Rd, Rajshahi 620", img:"Kaisar Memorial Hospital.jpg", website:"" },
    { name:"Amana Hospital Ltd.", address:"Jhoutala More, Rajshahi", img:"Amana Hospital Ltd..jpg", website:"http://www.amanahospital.com/" },
    { name:"Motherland Hospital", address:"Ibrahim Plaza, Lakshmipur", img:"Motherland Hospital.jpg", website:"" },
    { name:"Islami Bank Medical College Hospital", address:"Rajshahi City Bypass, Rajshahi 6203", img:"Islami Bank Medical College Hospital.jpg", website:"https://ibmchr.com/" }
  ],
  "Sylhet": [
    { name:"Oasis Hospital Sylhet", address:"Subhanighat, Bishwa Rd, Sylhet 3100", img:"Oasis Hospital Sylhet.jpg", website:"http://www.oasishospitalbd.com/" },
    { name:"Queen's Hospital", address:"Sylhet 3100", img:"Queen's Hospital.jpeg", website:"https://queenshospital.com.bd/" },
    { name:"Al Haramain Hospital", address:"Sylhet 3100", img:"Al Haramain Hospital.jpg", website:"https://www.haramainhospital.com/" },
    { name:"Popular Medical Centre Sylhet", address:"Bishwa Rd, Sylhet 3100", img:"POPULAR MEDICAL CENTRE AND HOSPITAL SYLHET.jpg", website:"https://popularsylhet.com/" },
    { name:"Sylhet Imperial Hospital", address:"Naiorpul, Sylhet 31000", img:"Sylhet Imperial Hospital.jpg", website:"https://www.imperial.hospital/" }
  ],
  "Barishal": [
    { name:"Arif Memorial Hospital", address:"Barishal", img:"Arif Memorial Hospital.jpg", website:"" },
    { name:"Islami Bank Hospital", address:"Barishal 8200", img:"Islami Bank Hospital.jpg", website:"" },
    { name:"Barishal General Hospital", address:"Hospital Rd, Barishal", img:"Barishal General Hospital.jpg", website:"" },
    { name:"South Apollo Medical College & Hospital", address:"Barishal", img:"South Apollo Medical College & Hospital.jpg", website:"https://samcb.edu.bd/" },
    { name:"Sher-E-Bangla Medical College Hospital", address:"Band Rd, Barishal 8200", img:"Sher-E-Bangla Medical College Hospital.jpeg", website:"https://www.sbmc.edu.bd/" },
    { name:"Royal City Hospital", address:"Brown Compound Rd, Barishal 8200", img:"Royal City Hospital.jpg", website:"https://royalcityhospital.com/" }
  ],
  "Rangpur": [
    { name:"Rangpur Medical College and Hospital", address:"Rangpur-Dinajpur Hwy, Rangpur 5400", img:"Rangpur Medical College and Hospital.jpg", website:"https://rpmc.edu.bd/" },
    { name:"Rangpur Central Hospital", address:"Rangpur-Dinajpur Hwy, Rangpur 5400", img:"Rangpur Central Hospital.jpg", website:"" },
    { name:"Kings Hospital Rangpur", address:"Rangpur", img:"Kings Hospital Rangpur.jpg", website:"" },
    { name:"Day-Night Hospital", address:"9 Dhaap Road, Rangpur 5400", img:"Day-Night Hospital.jpg", website:"" },
    { name:"Good Health Hospital", address:"Dhap Road, Rangpur 5400", img:"Good Health Hospital.jpg", website:"" }
  ],
  "Mymensingh": [
    { name:"Sodesh Hospital", address:"298/2, Mymensingh 2200", img:"Sodesh Hospital.jpg", website:"https://sodeshhospital.co/" },
    { name:"Liberty Hospital", address:"Mymensingh-Bhairab Rd, Mymensingh", img:"Liberty Hospital.jpg", website:"https://www.libertyhospital.org/" },
    { name:"Delta Health Care", address:"Charpara Rd, Mymensingh 2200", img:"Delta Health Care.jpg", website:"" },
    { name:"Mymensingh Medical Hospital", address:"Charpara Rd, Mymensingh 2200", img:"Mymensingh gov Medical Hospital.jpg", website:"http://medicalcollege.mymensingh.gov.bd/" }
  ]
};

function renderHospitals(city) {
  const grid = document.getElementById('hospitalsGrid');
  const empty = document.getElementById('hospitals-empty');
  grid.innerHTML = '';

  const list = hospitals[city] || [];

  if (!list.length) {
    grid.appendChild(empty);
    empty.style.display = 'block';
    return;
  }

  empty.style.display = 'none';

  list.forEach(h => {
    const imgSrc = h.img ? `${BASE_URL}/images/${h.img}` : null;

    grid.insertAdjacentHTML('beforeend', `
      <div class="hospital-card">
        ${imgSrc
          ? `<img class="hospital-card__img" src="${imgSrc}" alt="${h.name}" onerror="this.parentNode.querySelector('.hospital-card__img-placeholder') && (this.style.display='none')">`
          : `<div class="hospital-card__img-placeholder">🏥</div>`
        }
        <div class="hospital-card__body">
          <div class="hospital-card__name">${h.name}</div>
          <div class="hospital-card__addr"><i class="fas fa-map-marker-alt"></i>${h.address}</div>
        </div>
        <div class="hospital-card__footer">
          ${h.website
            ? `<a href="${h.website}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Visit Website</a>`
            : `<span style="font-size:.8rem;color:var(--text-muted)">No website</span>`
          }
        </div>
      </div>
    `);
  });
}

document.querySelectorAll('.city-tab').forEach(tab => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.city-tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    renderHospitals(tab.dataset.city);
  });
});

// Auto-render first city
renderHospitals('Dhaka');
