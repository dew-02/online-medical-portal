let savedInfo = {};

function openForm() {
    document.getElementById('formBox').classList.remove('hidden');
    document.getElementById('downloadReportBtn').classList.add('hidden');
}

function saveInfo() {
    const patientId = document.getElementById('patientId').value;
    const email = document.getElementById('email').value;
    const mobileNumber = document.getElementById('mobileNumber').value;
    const reportType = document.getElementById('reportType').value;
    const date = document.getElementById('date').value;
    const specialInfo = document.getElementById('specialInfo').value;

    if (patientId && email && mobileNumber && reportType && date) {
        savedInfo = {
            patientId,
            email,
            mobileNumber,
            reportType,
            date,
            specialInfo
        };

        document.getElementById('reportForm').classList.add('hidden');
        document.getElementById('messageBox').classList.remove('hidden');
    } else {
        alert('Please fill all required fields.');
    }
}

function viewInfo() {
    document.getElementById('messageBox').classList.add('hidden');
    document.getElementById('viewInfoBox').classList.remove('hidden');

    document.getElementById('viewPatientId').value = savedInfo.patientId;
    document.getElementById('viewEmail').value = savedInfo.email;
    document.getElementById('viewMobileNumber').value = savedInfo.mobileNumber;
    document.getElementById('viewReportType').value = savedInfo.reportType;
    document.getElementById('viewDate').value = savedInfo.date;
    document.getElementById('viewSpecialInfo').value = savedInfo.specialInfo;
}

function editInfo() {
    document.getElementById('viewInfoBox').classList.add('hidden');
    document.getElementById('editFormBox').classList.remove('hidden');

    document.getElementById('editPatientId').value = savedInfo.patientId;
    document.getElementById('editEmail').value = savedInfo.email;
    document.getElementById('editMobileNumber').value = savedInfo.mobileNumber;
    document.getElementById('editReportType').value = savedInfo.reportType;
    document.getElementById('editDate').value = savedInfo.date;
    document.getElementById('editSpecialInfo').value = savedInfo.specialInfo;
}

function updateInfo() {
    savedInfo.patientId = document.getElementById('editPatientId').value;
    savedInfo.email = document.getElementById('editEmail').value;
    savedInfo.mobileNumber = document.getElementById('editMobileNumber').value;
    savedInfo.reportType = document.getElementById('editReportType').value;
    savedInfo.date = document.getElementById('editDate').value;
    savedInfo.specialInfo = document.getElementById('editSpecialInfo').value;

    document.getElementById('editFormBox').classList.add('hidden');
    alert('Information updated successfully!');
}

function deleteInfo() {
    savedInfo = {};
    document.getElementById('editFormBox').classList.add('hidden');
    alert('Information deleted successfully!');
}