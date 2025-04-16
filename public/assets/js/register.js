// public/assets/js/register.js
document.getElementById("sendOtpBtn").addEventListener("click", function () {
    const email = document.getElementById("regEmail").value;
  
    if (!email) {
      alert("Please enter your email first.");
      return;
    }
  
    fetch("../../ajax/send-otp.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ email }),
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          alert("OTP sent to your email!");
        } else {
          alert(data.message || "Something went wrong.");
        }
      })
      .catch(err => {
        console.error(err);
        alert("Failed to send OTP.");
      });
  });
  