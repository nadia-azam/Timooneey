<?php
include ("../components/connect.php");
if(isset($_COOKIE['tutor_id'])){
    $tutor_id = $_COOKIE['tutor_id'];
}else{
    $tutor_id = '';
    header('location:login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage tracker</title>
    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.com/libraries/font-awesome">
    <!-- custom css file link-->
    <link rel="stylesheet" href="../css/admin_style.css">
    <link rel="icon" href="../images/myLogoLettreGrand.png" type="image/x-icon">

</head>

<style>
      .container {
          position: relative;
          padding: 50px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          border-radius: 8px;
          box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
          background-color: white;
        }
        
        .container .inputBox {
          position: relative;
          width: 350px;
          margin-bottom: 20px;
        }
        
        .container .inputBox input {
          position: relative;
          padding: 8px 10px;
          border: none;
          outline: none;
          color: #fff;
          background: transparent;
          font-size: 1.25em;
          letter-spacing: 0.05em;
          z-index: 2;
        }
        
        .container .inputBox span {
          position: absolute;
          left: 0;
          padding: 10px 0;
          pointer-events: none;
          font-size: 1em;
          transition: 0.5s;
          color: #333;
          letter-spacing: 0.05em;
        }
        
        .container .inputBox input:valid ~ span,
        .container .inputBox input:focus ~ span {
          font-size: 0.85em;
          transform: translateY(-32px);
        }
        
        .container .inputBox i {
          position: absolute;
          bottom: 0;
          left: 0;
          width: 100%;
          height: 3px;
          background: linear-gradient(45deg, #21ecf3, #f8ee93);
          transition: 0.5s;
          z-index: 1;
          border-radius: 4px;
          pointer-events: none;
        }
        
        .container .inputBox input:valid ~ i,
        .container .inputBox input:focus ~ i {
          height: 100%;
          box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.25);
        }
        #h{
            text-align: center;
        }

        .container .inputBox input[type="number"]::-webkit-inner-spin-button,
        .container .inputBox input[type="number"]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        .container .inputBox input[type="number"] {
          -moz-appearance: textfield;
        }

        .table-container {
        margin-top: 2rem;
        }
        .table-container table {
    width: 100%;
    border-collapse: collapse;
  }

  .table-container th,
  .table-container td {
    padding: 0.5rem;
    border: 1px solid #ccc;
  }

  .goal-reached {
    animation: bounce 1s;
  }

  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0);
    }
    40% {
      transform: translateY(-20px);
    }
    60% {
      transform: translateY(-10px);
    }
  }
  #go {
  text-decoration: none;
  color:#fff;
  font-size: 20px;
  letter-spacing: 2px;
  background: linear-gradient(225deg, #9fb0d6 0%, #25cfdb 50%, #f0e1b0 100%);
  border-radius: 40px;
  padding: 12px 36px;
  position: relative;
  overflow: hidden;
  border: none;
  cursor: pointer;
  box-shadow: 0px -0px 0px 0px rgb(137, 222, 243), 0px 0px 0px 0px rgba(39, 200, 255, 0.5);
}




#go:hover {
  background: linear-gradient(225deg, #367e6e 0%, #90c98b 50%, #f0e1b0 100%);

  transform: translate(0,-6px);
  box-shadow: 10px -10px 25px 0px rgba(6, 7, 7, 0.25), -10px 10px 25px 0px rgba(10, 21, 22, 0.25);

}
#go:hover ::after{

transform: rotate(150deg);
}
        


    </style>




<body>
<?php
    include ("../components/admin_header.php");
    
    ?>

<section class="dashboard">
    <h1 class="heading">Money saving tracker</h1>

    
    <div class="container">
        <div class="inputBox">
          <input type="text" id="trackerTitle" required="required">
          <span>I'm Saving For ...:</span>
          <i></i>
        </div>
        <br>

        <div class="inputBox">
          <input type="date"  id="trackerDate" required="required">
          <span style="z-index: 2;">Tracker Date:</span>
          <i></i>
        </div>
        <br>

        <div class="inputBox">
          <input type="number" id="targetAmount" required="required">
          <span>Target amount:</span>
          <i></i>
        </div>
        <br>

        <div class="inputBox">
            <input  type="number" id="depositDays" required="required">
            <span>Number of days:</span>
            <i></i>
        </div>
        <button  onclick="generateTable()" id="go" href="#">Generate Table</button>
        

        <p id="depositAmount"></p>
    </div>
    <div class="table-container">
        <table id="trackerTable">
          <thead>
            <tr>
              <th>Day</th>
              <th>Accumulated Amount</th>
              <th>Deposit</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>




</section>



<script >
        let footer = document.querySelector('.footer');
        let body = document.body;

        let  profile = document.querySelector('.header .flex .profile');
        let  searchform = document.querySelector('.header .flex .search-form');
        let  sideBar = document.querySelector('.side-bar');
        let logo = document.getElementById("#logo2");

        document.querySelector('#user-btn').onclick = () =>{
            profile.classList.toggle('active');
            
            searchform.classList.remove('active');
        }

        document.querySelector('#search-btn').onclick = () =>{
            searchform.classList.toggle('active');
            profile.classList.remove('active');
           
        }

        document.querySelector('#menu-btn').onclick = () =>{
            sideBar.classList.toggle('active');
            body.classList.toggle('active');
            footer.classList.toggle('active');
        }

        document.querySelector('#close-bar').onclick = () =>{
            sideBar.classList.remove('active');
            
        }


        window.onscroll = () =>{
            profile.classList.remove('active');
            searchform.classList.remove('active');


            if(window.innerWidth <1200){
                sideBar.classList.remove('active');
                body.classList.remove('active');
                footer.classList.remove('active');

            }
        }

        /*let toggleBtn = document.querySelector('#toggle-btn');
        let darkMode = localStorage.getItem('dark-mode');

        const enabelDarkMode = () => {
            toggleBtn.classList.replace('fa-sun','fa-moon');
            body.classList.add('dark');
            localStorage.setItem('dark-mode','enabled');
            logo.src="../images/myLogo(1).jpg";
        }

        const disableDarkMode = () => {
            toggleBtn.classList.replace('fa-moon','fa-sun');
            body.classList.remove('dark');
            localStorage.setItem('dark-mode','disabled');
            logo.src="../images/myLogo.jpeg";
        }

        if(darkMode === 'enabled'){
            enabelDarkMode();
        }

        toggleBtn.onclick= (e) =>{
            let darkMode = localStorage.getItem('dark-mode');
            if(darkMode === 'disabled'){
                enabelDarkMode();
            }else{
                disableDarkMode();
            }
        }*/


        function generateTable() {
          const trackerTitle = document.getElementById('trackerTitle').value;
          const trackerDate = document.getElementById('trackerDate').value;
          const targetAmount = parseInt(document.getElementById('targetAmount').value);
          const depositDays = parseInt(document.getElementById('depositDays').value);
    
      if (!targetAmount || !depositDays || !trackerTitle || !trackerDate) {
        alert("Please complete the fields with your personal information !");
        return;
      }
    
          const tableBody = document.querySelector('#trackerTable tbody');
          tableBody.innerHTML = '';
    
          let accumulatedAmount = 0;
    
          for (let i = 1; i <= depositDays; i++) {
            const row = document.createElement('tr');
            const dayCell = document.createElement('td');
            dayCell.textContent = i;
    
            const amountCell = document.createElement('td');
            amountCell.textContent = accumulatedAmount.toFixed(2);
    
            const depositCell = document.createElement('td');
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.onchange = function() {
              if (checkbox.checked) {
                accumulatedAmount += Math.ceil(targetAmount / depositDays);
              } else {
                accumulatedAmount -= Math.ceil(targetAmount / depositDays);
              }
    
              amountCell.textContent = accumulatedAmount.toFixed(2);
    
              if (accumulatedAmount >= targetAmount) {
                row.classList.add("goal-reached");
              } else {
                row.classList.remove("goal-reached");
              }
              if (accumulatedAmount >= targetAmount) {
                row.classList.add("goal-reached");
                alert("Congratulations! You have reached your goal.");
              } else {
                row.classList.remove("goal-reached");
              }
            };
    
            depositCell.appendChild(checkbox);
    
            row.appendChild(dayCell);
            row.appendChild(amountCell);
            row.appendChild(depositCell);
    
            tableBody.appendChild(row);
          }
    
          const depositAmount = Math.ceil(targetAmount / depositDays);
          document.getElementById('depositAmount').textContent = "Deposit amount per day: " + depositAmount + "MAD";
    
          // Set tracker title and date
          document.title = trackerTitle;
          document.getElementById('trackerTable').caption.textContent = "Tracker Date: " + trackerDate;
        }
        
        
        
        
    </script>
</body>
</html>