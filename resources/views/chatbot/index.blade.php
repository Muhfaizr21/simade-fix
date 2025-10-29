<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chatbot SIMADE</title>
<style>
:root {
    --chat-bg: #fff;
    --input-bg: #f0f0f0;
    --text-color: #000;
    --primary-gradient: linear-gradient(135deg, #007bff, #00c6ff);
    --bot-bubble: #e9f3ff;
}
@media (prefers-color-scheme: dark) {
    :root {
        --chat-bg: #1f1f1f;
        --input-bg: #2a2a2a;
        --text-color: #f1f1f1;
        --bot-bubble: #2a3a4f;
    }
}

body { margin:0; font-family: 'Segoe UI', sans-serif; }

#chatbot-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 65px; height: 65px;
    border-radius: 50%;
    display: flex; justify-content: center; align-items: center;
    font-size: 28px;
    cursor: pointer;
    background: var(--primary-gradient);
    color: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
    z-index: 9999;
}
#chatbot-button:hover { transform: scale(1.1); box-shadow: 0 6px 18px rgba(0,0,0,0.4); }

#chatbot-box {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 360px; max-width: 90%;
    height: 500px;
    background: var(--chat-bg);
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    display: none; flex-direction: column; overflow: hidden;
    animation: fadeInUp 0.3s ease-out;
    z-index: 9999;
}

@keyframes fadeInUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

#chatbot-header {
    background: var(--primary-gradient);
    color: #fff;
    padding: 14px; text-align: center;
    font-weight: bold; font-size: 16px;
    position: relative;
}

#chatbot-clear {
    position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
    background: #ff4d4f; border:none; color:#fff; padding:4px 10px;
    border-radius: 8px; cursor:pointer; font-size:13px;
    transition: 0.2s;
}
#chatbot-clear:hover { background:#ff7875; }

#chatbot-messages {
    flex: 1; padding:12px; display:flex; flex-direction:column; gap:12px;
    overflow-y:auto;
}
.bubble {
    display:flex; align-items:flex-end; gap:8px; max-width:85%;
    animation: fadeInUp 0.3s ease-out;
}
.bubble.user { align-self:flex-end; flex-direction: row-reverse; }
.bubble.bot { align-self:flex-start; }

.bubble img { width:35px; height:35px; border-radius:50%; }

.message {
    padding:10px 14px; border-radius:15px; line-height:1.4;
    box-shadow: 0 1px 5px rgba(0,0,0,0.1);
}
.message.user { background: var(--primary-gradient); color:#fff; border-radius:15px 15px 0 15px; }
.message.bot { background: var(--bot-bubble); color: var(--text-color); border-radius:15px 15px 15px 0; }

.typing { font-style:italic; color:gray; font-size:13px; margin-left:45px; }

#chatbot-input-area {
    display:flex; border-top:1px solid #ddd; background: var(--input-bg);
}
#chatbot-input { flex:1; border:none; padding:12px 15px; outline:none; font-size:14px; background:transparent; color: var(--text-color); }
#chatbot-send { background: var(--primary-gradient); color:#fff; border:none; padding:12px 18px; cursor:pointer; border-radius:0 0 20px 0; font-size:16px; transition:0.2s; }
#chatbot-send:hover { opacity:0.9; }

::-webkit-scrollbar { width:6px; }
::-webkit-scrollbar-thumb { background:#ccc; border-radius:10px; }
</style>
</head>
<body>

<div id="chatbot-button">💬</div>

<div id="chatbot-box">
    <div id="chatbot-header">
        🤖SIMADE
        <button id="chatbot-clear">🗑️</button>
    </div>

    <div id="chatbot-messages"></div>

    <div id="chatbot-input-area">
        <input id="chatbot-input" type="text" placeholder="Ketik pesan...">
        <button id="chatbot-send">➤</button>
    </div>
</div>

<script>
const button = document.getElementById('chatbot-button');
const box = document.getElementById('chatbot-box');
const messages = document.getElementById('chatbot-messages');
const input = document.getElementById('chatbot-input');

window.addEventListener('load', () => {
    const history = JSON.parse(localStorage.getItem('chatHistory')) || [];
    if(history.length===0){
        appendMessage("👋 Halo! Saya <b>asisten virtual SIMADE</b>. Ada yang bisa saya bantu tentang Desa Dongkal?",'bot');
    } else { history.forEach(msg=>appendMessage(msg.text,msg.sender)); }
});

button.addEventListener('click',()=>{ box.style.display = box.style.display==='none'||box.style.display===''?'flex':'none'; if(box.style.display==='flex') input.focus(); });

document.getElementById('chatbot-send').addEventListener('click', sendMessage);
input.addEventListener('keypress',e=>{ if(e.key==='Enter') sendMessage(); });

document.getElementById('chatbot-clear').addEventListener('click',()=>{
    if(confirm('Apakah Anda yakin ingin menghapus semua chat?')){
        messages.innerHTML='';
        localStorage.removeItem('chatHistory');
    }
});

function appendMessage(text,sender){
    const bubble=document.createElement('div');
    bubble.classList.add('bubble',sender);

    const avatar=document.createElement('img');
    avatar.src=sender==='user'?'https://i.pravatar.cc/35?img=68':'https://cdn-icons-png.flaticon.com/512/4712/4712109.png';

    const msg=document.createElement('div');
    msg.classList.add('message',sender);
    msg.innerHTML=text;

    bubble.appendChild(avatar);
    bubble.appendChild(msg);
    messages.appendChild(bubble);
    messages.scrollTo({top:messages.scrollHeight,behavior:'smooth'});

    saveChatHistory();
}

function showTyping(){
    const typing=document.createElement('div');
    typing.classList.add('typing'); typing.innerText="Bot sedang mengetik...";
    messages.appendChild(typing); messages.scrollTo({top:messages.scrollHeight,behavior:'smooth'});
    return typing;
}

function saveChatHistory(){
    const chatData=[];
    messages.querySelectorAll('.bubble').forEach(b=>{
        const sender=b.classList.contains('user')?'user':'bot';
        const text=b.querySelector('.message').innerHTML;
        chatData.push({sender,text});
    });
    localStorage.setItem('chatHistory',JSON.stringify(chatData));
}

function sendMessage(){
    const text=input.value.trim();
    if(!text) return;
    appendMessage(text,'user');
    input.value='';

    const typing=showTyping();

    fetch('/chatbot/ask',{
        method:'POST',
        headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
        body:JSON.stringify({question:text})
    }).then(res=>res.json()).then(data=>{
        setTimeout(()=>{ typing.remove(); appendMessage(data.answer,'bot'); },800);
    }).catch(()=>{
        typing.remove(); appendMessage('⚠️ Maaf, terjadi kesalahan koneksi 😅','bot');
    });
}
</script>

</body>
</html>
