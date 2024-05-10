document.addEventListener("DOMContentLoaded", function () {
    // Populate the list of diseases
    populateDiseaseList();

    // Add event listener for search input
    document.getElementById('searchInput').addEventListener('input', function () {
        var searchValue = this.value.toLowerCase();
        var diseaseItems = document.querySelectorAll('#diseaseList li');

        diseaseItems.forEach(function (item) {
            var diseaseName = item.textContent.toLowerCase();
            if (diseaseName.includes(searchValue)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});

// Function to populate the disease list
function populateDiseaseList() {
    // Define the list of diseases with categories

    var diseases = {
        "Infectious Diseases": [
            "COVID-19", "Influenza", "Tuberculosis", "HIV/AIDS", "Malaria",
            "Hepatitis", "Dengue Fever", "Ebola Virus Disease", "Zika Virus Infection", "Cholera"
        ],
        "Cardiovascular Diseases": [
            "Coronary Artery Disease", "Hypertension (High Blood Pressure)", "Stroke", "Heart Failure", "Arrhythmias"
        ],
        "Respiratory Diseases": [
            "Asthma", "Chronic Obstructive Pulmonary Disease (COPD)", "Pneumonia", "Tuberculosis"
        ],
        "Neurological Disorders": [
            "Alzheimer's Disease", "Parkinson's Disease", "Multiple Sclerosis", "Epilepsy", "Migraine", "Stroke"
        ],
        "Cancer": [
            "Breast Cancer", "Lung Cancer", "Prostate Cancer", "Colorectal Cancer", "Skin Cancer", "Leukemia", "Lymphoma"
        ],
        "Metabolic Disorders": [
            "Diabetes Mellitus (Type 1 and Type 2)", "Obesity", "Metabolic Syndrome", "Thyroid Disorders"
        ],
        "Autoimmune Diseases": [
            "Rheumatoid Arthritis", "Systemic Lupus Erythematosus (SLE)", "Multiple Sclerosis", "Psoriasis",
            "Inflammatory Bowel Disease (Crohn's Disease and Ulcerative Colitis)"
        ],
        "Genetic Disorders": [
            "Down Syndrome", "Cystic Fibrosis", "Sickle Cell Disease", "Huntington's Disease", "Hemophilia",
            "Duchenne Muscular Dystrophy"
        ],
        "Mental Health Disorders": [
            "Depression", "Anxiety Disorders", "Bipolar Disorder", "Schizophrenia", "Obsessive-Compulsive Disorder (OCD)",
            "Post-Traumatic Stress Disorder (PTSD)"
        ],
        "Digestive System Disorders": [
            "Gastroesophageal Reflux Disease (GERD)", "Peptic Ulcer Disease", "Irritable Bowel Syndrome (IBS)",
            "Crohn's Disease", "Ulcerative Colitis", "Cold", "Cough", "Fever"
        ]
    };

    var ul = document.getElementById('diseaseList');

    // Loop through each category and its diseases
    for (const [category, diseasesArray] of Object.entries(diseases)) {
        var categoryLi = document.createElement('li');
        categoryLi.innerHTML = `<strong>${category}</strong>`;
        ul.appendChild(categoryLi);

        diseasesArray.forEach(disease => {
            var diseaseLi = document.createElement('li');
            diseaseLi.textContent = disease;
            ul.appendChild(diseaseLi);
        });
    }
}
