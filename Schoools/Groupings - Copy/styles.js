document.addEventListener("DOMContentLoaded", function () {
    const studentinp = document.getElementById('student_number');
    const radio_stud = document.querySelector('#status_student');
    const radio_admin = document.querySelector('#status_admin');
    const header_text = document.querySelector('#header');
    const form_inps = document.querySelector('#form_group_inps');

    document.querySelector('.form_group').addEventListener('click', () =>{
        if (radio_stud.checked == true){
            header_text.innerHTML = "Enrollment";
            studentinp.style.display = "block";
            form_inps.style.display = "block";
        } else if (radio_admin.checked == true){
            header_text.innerHTML = "Registeration";
            studentinp.style.display = "none";
            form_inps.style.display = "block";    
        }
    })
    
});