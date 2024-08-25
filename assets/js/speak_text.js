document.addEventListener("DOMContentLoaded", function() {
    const content_text = document.getElementById('content'); // Removed '#' symbol
    const content_speak = document.getElementById('speak'); // Removed '#' symbol
  
    let check_playing = false;
    let currentUtterance = null;
  
    content_speak.addEventListener('click', toggleSpeak);
  
    function toggleSpeak() {
      if (check_playing) {
        pauseSpeech();
      } else {
        startSpeech();
      }
    }
  
    function startSpeech() {
      window.speechSynthesis.cancel();
      const text = content_text.textContent; // Use textContent to get the text content
      if (text.length > 200) {
        speakLongText(text);
      } else {
        const utterance = new SpeechSynthesisUtterance(text);
        window.speechSynthesis.speak(utterance);
        currentUtterance = utterance;
      }
  
      check_playing = true;
    }
  
    function pauseSpeech() {
      if (currentUtterance) {
        window.speechSynthesis.pause();
        check_playing = false;
      }
    }
  
    function speakLongText(longText) {
      window.speechSynthesis.cancel();
      const chunkSize = 200;
      const chunks = [];
      let start = 0;
  
      while (start < longText.length) {
        chunks.push(longText.substr(start, chunkSize));
        start += chunkSize;
      }
      speakChunks(chunks);
    }
  
    function speakChunks(chunks) {
      if (chunks.length === 0) {
        check_playing = false;
        return;
      }
  
      const chunk = chunks.shift();
      const utterance = new SpeechSynthesisUtterance(chunk);
  
      utterance.onend = function() {
        setTimeout(function() {
          speakChunks(chunks);
        }, 1000);
      };
  
      window.speechSynthesis.speak(utterance);
      currentUtterance = utterance;
    }
  });
  