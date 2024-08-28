<!DOCTYPE html>
<html>
<head>
  <title>Strona HTML</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    .container {
      width: 80%;
      margin: 40px auto;
      background-color: #fff;
      padding: 20px;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .status {
      font-size: 24px;
      margin-bottom: 10px;
    }
    .status-icon {
      width: 24px;
      height: 24px;
      margin-right: 5px;
    }
    .username {
      font-size: 18px;
      margin-bottom: 10px;
    }
    .error-message {
      color: #f00;
      font-size: 18px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Strona HTML</h1>
    </div>
    <div id="user-info">
      <div class="status">
        <img class="status-icon" id="status-icon" src="red.png" alt="Nieaktywny">
        <span id="status-text"></span>
      </div>
      <div class="username">
        <span id="username"></span>
      </div>
    </div>
    <div id="error-message" class="error-message"></div>
  </div>

  <script>
    const webhookUrl = 'https://adamusekk.netlify.app/'; // adres URL webhooka, który będzie wysyłał dane na stronę HTML

    async function updateUserInfo(data) {
      const userInfo = document.getElementById('user-info');
      const statusText = document.getElementById('status-text');
      const username = document.getElementById('username');
      const statusIcon = document.getElementById('status-icon');
      const errorMessage = document.getElementById('error-message');

      if (data.active) {
        statusText.textContent = 'Aktywny';
        statusIcon.src = 'green.png';
      } else {
        statusText.textContent = 'Nieaktywny';
        statusIcon.src = 'red.png';
      }
      username.textContent = data.username;
      errorMessage.textContent = '';
    }

    async function fetchUserData() {
      try {
        const response = await fetch(webhookUrl);
        const data = await response.json();
        updateUserInfo(data);
      } catch (error) {
        const errorMessage = document.getElementById('error-message');
        errorMessage.textContent = 'Brak połączenia';
      }
    }

    fetchUserData();

    setInterval(fetchUserData, 2000); // aktualizuj informację co 5 sekund
  </script>
</body>
</html>
