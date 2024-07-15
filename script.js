function showSection(sectionId) {
    const sections = document.querySelectorAll('main > section');
    sections.forEach(section => {
        section.style.display = section.id === sectionId ? 'block' : 'none';
    });
}

document.getElementById('criminalForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('add_criminal.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Criminal added successfully!');
            this.reset();
        } else {
            alert('Error adding criminal: ' + data.error);
        }
    });
});

document.getElementById('caseForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('add_case.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Case file added successfully!');
            this.reset();
        } else {
            alert('Error adding case file: ' + data.error);
        }
    });
});

// Fetch and display criminal records
function fetchCriminals() {
    fetch('get_criminals.php')
    .then(response => response.json())
    .then(data => {
        const list = document.getElementById('criminalsList');
        list.innerHTML = data.map(criminal => `
            <div class="criminal">
                <h3>${criminal.FirstName} ${criminal.LastName}</h3>
                <p>DOB: ${criminal.DOB}</p>
                <p>Gender: ${criminal.Gender}</p>
                <p>Address: ${criminal.Address}</p>
                <img src="${criminal.Photo}" alt="${criminal.FirstName}'s photo">
            </div>
        `).join('');
    });
}

// Fetch and display case files
function fetchCases() {
    fetch('get_cases.php')
    .then(response => response.json())
    .then(data => {
        const list = document.getElementById('casesList');
        list.innerHTML = data.map(caseFile => `
            <div class="case-file">
                <h3>Case ID: ${caseFile.CaseID}</h3>
                <p>Criminal ID: ${caseFile.CriminalID}</p>
                <p>Crime ID: ${caseFile.CrimeID}</p>
                <p>Date: ${caseFile.Date}</p>
                <p>Details: ${caseFile.Details}</p>
            </div>
        `).join('');
    });
}

// Load data on page load
window.onload = function() {
    fetchCriminals();
    fetchCases();
}
