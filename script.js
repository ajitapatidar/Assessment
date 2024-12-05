// Country, State, and District (City) Data
  const data = {
    "India": {
      "Maharashtra": ["Mumbai", "Pune", "Nagpur", "Nashik", "Aurangabad"],
      "Gujarat": ["Ahmedabad", "Surat", "Vadodara", "Rajkot"],
      "Karnataka": ["Bengaluru", "Mysuru", "Hubli", "Mangalore"]
    },
    "USA": {
      "California": ["Los Angeles", "San Francisco", "San Diego", "Sacramento"],
      "Texas": ["Houston", "Dallas", "Austin", "San Antonio"],
      "Florida": ["Miami", "Orlando", "Tampa", "Jacksonville"]
    },
    "Australia": {
      "New South Wales": ["Sydney", "Newcastle", "Wollongong"],
      "Queensland": ["Brisbane", "Cairns", "Gold Coast"],
      "Victoria": ["Melbourne", "Geelong", "Ballarat"]
    },
    "Canada": {
      "Ontario": ["Toronto", "Ottawa", "Mississauga", "Hamilton"],
      "British Columbia": ["Vancouver", "Victoria", "Surrey"],
      "Quebec": ["Montreal", "Quebec City", "Laval"]
    },
    "UK": {
      "England": ["London", "Manchester", "Birmingham", "Liverpool"],
      "Scotland": ["Edinburgh", "Glasgow", "Aberdeen"],
      "Wales": ["Cardiff", "Swansea", "Newport"]
    }
  };

  // Populate the State dropdown based on the selected Country
  document.getElementById('country').addEventListener('change', function () {
    const country = this.value;
    const stateDropdown = document.getElementById('state');
    stateDropdown.innerHTML = '<option value="">Select State</option>';

    if (data[country]) {
      const states = Object.keys(data[country]);
      states.forEach(state => {
        const option = document.createElement('option');
        option.value = state;
        option.text = state;
        stateDropdown.appendChild(option);
      });
    }

    // Reset the district dropdown
    const districtDropdown = document.getElementById('district');
    districtDropdown.innerHTML = '<option value="">Select District (City)</option>';
  });

  // Populate the District (City) dropdown based on the selected State
  document.getElementById('state').addEventListener('change', function () {
    const state = this.value;
    const country = document.getElementById('country').value;
    const districtDropdown = document.getElementById('district');
    districtDropdown.innerHTML = '<option value="">Select District (City)</option>';

    if (country && state && data[country][state]) {
      data[country][state].forEach(district => {
        const option = document.createElement('option');
        option.value = district;
        option.text = district;
        districtDropdown.appendChild(option);
      });
    }
  });

  // Form Validation and Submission
  document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;
    const country = document.getElementById('country').value;
    const state = document.getElementById('state').value;
    const district = document.getElementById('district').value;
    const gender = document.querySelector('input[name="gender"]:checked') ? document.querySelector('input[name="gender"]:checked').value : '';
    const mobile = document.getElementById('mobile').value;

    if (!name || !email || !address || !country || !state || !district || !gender || !mobile) {
      alert('Please fill all the fields!');
      return;
    }

    // Show an alert indicating successful submission
    alert('Form submitted successfully!');

    // Reset the form
    document.getElementById('contactForm').reset();

    // Reset the State and District dropdowns as well
    document.getElementById('state').innerHTML = '<option value="">Select State</option>';
    document.getElementById('district').innerHTML = '<option value="">Select District (City)</option>';
  });

