
    const chatButton = document.getElementById('chatButton');
    const chatPanel = document.getElementById('chatPanel');
    const closeChat = document.getElementById('closeChat');
    const chatBody = document.getElementById('chatBody');
    const form = document.getElementById('inputForm');
    const input = document.getElementById('messageInput');

    chatButton.addEventListener('click', () => {
      chatPanel.style.display = 'flex';
    });
    closeChat.addEventListener('click', () => {
      chatPanel.style.display = 'none';
    });

    form.addEventListener('submit', async e => {
      e.preventDefault();
      const text = input.value.trim();
      if (!text) return;

      
      appendMessage(text, 'user');
      input.value = '';

      // Loading teksti
      const loadingDiv = appendMessage('Loading…', 'bot', true);

      try {
        const res = await fetch('chat.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ message: text }),
        });
        const { reply } = await res.json();

        
        loadingDiv.textContent = reply;
        loadingDiv.classList.remove('loading');

      } catch (err) {
      
        loadingDiv.textContent = 'Error: could not reach server';
        loadingDiv.classList.remove('loading');
      }
    });


    function appendMessage(text, role, isLoading = false) {
      const div = document.createElement('div');
      div.className = `message ${role}` + (isLoading ? ' loading' : '');
      div.textContent = text;
      chatBody.appendChild(div);
      chatBody.scrollTop = chatBody.scrollHeight;
      return div;
    }
  