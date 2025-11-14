<style>
/* ===============================
   FLOATING BUTTON — FIX NO ICON
================================== */
#chatbot-button {
    position: fixed;
    bottom: 25px;
    right: 25px;
    width: 64px;
    height: 64px;
    background: #0ea5e9;
    border-radius: 18px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 8px 22px rgba(0,0,0,0.25);
    transition: 0.25s ease;
    z-index: 99999;
}

#chatbot-button:hover {
    transform: scale(1.07);
    background: #0284c7;
}

#chatbot-button svg {
    width: 34px;
    height: 34px;
    stroke: #fff;
}


/* ===============================
   CHATBOX
================================== */
#chatbot-box {
    position: fixed;
    bottom: 100px;
    right: 25px;
    width: 360px;
    height: 520px;
    background: #ffffff;
    border-radius: 20px;
    display: none;
    flex-direction: column;
    border: 1px solid #e2e8f0;
    box-shadow: 0 15px 45px rgba(0,0,0,0.25);
    overflow: hidden;
    z-index: 99999;
}

/* Header */
#chatbot-header {
    background: #0ea5e9;
    padding: 14px 18px;
    font-weight: 700;
    font-size: 17px;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#chatbot-header button {
    background: none;
    border: none;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
}

#chatbot-header button svg {
    width: 20px;
    height: 20px;
    stroke: #fff;
}

/* Messages area */
#chatbot-messages {
    padding: 14px;
    overflow-y: auto;
    flex-grow: 1;
    background: #f1f5f9;
}

.bubble {
    display: flex;
    align-items: flex-start;
    margin-bottom: 14px;
}

.avatar-icon {
    width: 34px;
    height: 34px;
    background: #e2e8f0;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 10px;
}

.bot .avatar-icon {
    background: #0ea5e9;
}

.user .avatar-icon {
    background: #475569;
}

.avatar-icon svg {
    width: 20px;
    height: 20px;
    stroke: #fff;
}

.message {
    padding: 11px 14px;
    border-radius: 14px;
    max-width: 250px;
    line-height: 1.4;
    font-size: 14px;
}

.bot .message {
    background: #e0f2fe;
    color: #0c4a6e;
}

.user .message {
    background: #cbd5e1;
    color: #0f172a;
}

.delete-message-btn {
    background: none;
    border: none;
    color: #ef4444;
    font-size: 16px;
    margin-left: 6px;
    cursor: pointer;
}

/* typing */
.typing {
    font-size: 13px;
    color: #475569;
}

/* Input area */
#chatbot-input-area {
    padding: 10px;
    display: flex;
    gap: 10px;
    background: white;
    border-top: 1px solid #e2e8f0;
}

#chatbot-input {
    flex: 1;
    padding: 10px;
    border-radius: 12px;
    background: #f1f5f9;
    border: 1px solid #cbd5e1;
    outline: none;
    color: #0f172a;
}

#chatbot-send {
    width: 45px;
    border: none;
    border-radius: 12px;
    background: #0ea5e9;
    cursor: pointer;
}

#chatbot-send svg {
    width: 20px;
    height: 20px;
    stroke: #fff;
}

#chatbot-send:disabled {
    opacity: 0.4;
    cursor: not-allowed;
}
</style>

<!-- ============================================= -->
<!-- HTML CHATBOT (ikon SVG built-in) -->
<!-- ============================================= -->
<div id="chatbot-button">
    <!-- CHAT ICON (SVG) -->
    <svg fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 20l1.3-3.9A8 8 0 1 1 12 20H3z"></path>
    </svg>
</div>

<div id="chatbot-box">
    <div id="chatbot-header">
        <span>🤖 SIMADE AI</span>
        <button id="chatbot-clear">
            <svg fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 6h18M8 6v14m8-14v14M5 6l1-3h12l1 3"></path>
            </svg>
        </button>
    </div>

    <div id="chatbot-messages"></div>

    <div id="chatbot-input-area">
        <input id="chatbot-input" type="text" placeholder="Ketik pesan...">
        <button id="chatbot-send" disabled>
            <svg fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 2L11 13"></path>
                <path d="M22 2L15 22l-4-9-9-4 20-7z"></path>
            </svg>
        </button>
    </div>
</div>
<!-- ===================================================== -->
<!--                 JAVASCRIPT (ASLI, TIDAK DIUBAH)       -->
<!-- ===================================================== -->
<script>
const CHATBOT_API_URL = '/chatbot/ask';
const button = document.getElementById('chatbot-button');
const box = document.getElementById('chatbot-box');
const messages = document.getElementById('chatbot-messages');
const input = document.getElementById('chatbot-input');
const sendButton = document.getElementById('chatbot-send');

function saveChatHistory(){
    const chatData=[];
    messages.querySelectorAll('.bubble').forEach(b=>{
        const sender=b.classList.contains('user')?'user':'bot';
        const text=b.querySelector('.message').innerText;
        chatData.push({sender,text});
    });
    localStorage.setItem('chatHistory',JSON.stringify(chatData));
}

function deleteIndividualMessage(event) {
    const bubbleToDelete = event.currentTarget.closest('.bubble');
    if (bubbleToDelete) {
        bubbleToDelete.remove();
        saveChatHistory();
    }
}

function appendMessage(text,sender){
    const bubble=document.createElement('div');
    bubble.classList.add('bubble',sender);

    const avatar=document.createElement('div');
    avatar.classList.add('avatar-icon');
    avatar.innerHTML = sender === 'user' ? '<i class="ti ti-user-circle"></i>' : '<i class="ti ti-robot-face"></i>';

    const msg=document.createElement('div');
    msg.classList.add('message',sender);
    msg.innerHTML=text.replace(/\n/g, '<br>');

    const deleteBtn = document.createElement('button');
    deleteBtn.classList.add('delete-message-btn');
    deleteBtn.innerHTML = '<i class="ti ti-x"></i>';
    deleteBtn.title = 'Hapus pesan ini';
    deleteBtn.onclick = deleteIndividualMessage;

    if(sender === 'user'){
        msg.appendChild(deleteBtn);
    }

    bubble.appendChild(avatar);
    bubble.appendChild(msg);
    messages.appendChild(bubble);
    messages.scrollTo({top:messages.scrollHeight,behavior:'smooth'});

    saveChatHistory();
}

function showTyping(){
    const typing=document.createElement('div');
    typing.classList.add('typing');
    typing.id = 'current-typing';
    typing.innerHTML="Simade sedang mengetik<span>.</span><span>.</span><span>.</span>";
    messages.appendChild(typing);
    messages.scrollTo({top:messages.scrollHeight,behavior:'smooth'});
    return typing;
}

function setInputState(enabled) {
    input.disabled = !enabled;
    sendButton.disabled = !enabled;
    input.placeholder = enabled ? "Ketik pesan..." : "Tunggu sebentar...";
    if (!enabled) sendButton.disabled = true;
}

window.addEventListener('load', () => {
    const history = JSON.parse(localStorage.getItem('chatHistory')) || [];
    if(history.length === 0){
        appendMessage("👋 Halo! Saya <b>asisten virtual SIMADE</b>. Ada yang bisa saya bantu tentang Desa Dongkal?",'bot');
    } else {
        history.forEach(msg => appendMessage(msg.text, msg.sender));
    }
    sendButton.disabled = false;
});

button.addEventListener('click',() => {
    box.style.display = box.style.display === 'none' || box.style.display === '' ? 'flex' : 'none';
    if(box.style.display === 'flex') {
        input.focus();
        messages.scrollTo({top:messages.scrollHeight,behavior:'smooth'});
    }
});

sendButton.addEventListener('click', sendMessage);
input.addEventListener('keypress',e=>{
    if(e.key === 'Enter') {
        sendMessage();
        e.preventDefault();
    }
});

input.addEventListener('input', () => {
    sendButton.disabled = input.value.trim() === '';
});

document.getElementById('chatbot-clear').addEventListener('click',()=>{
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Hapus Riwayat Chat?',
            text: "Riwayat chat Anda akan hilang permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff4d4f',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                messages.innerHTML='';
                localStorage.removeItem('chatHistory');
                Swal.fire('Terhapus!', 'Riwayat chat berhasil dihapus.', 'success');
                appendMessage("👋 Halo! Saya <b>asisten virtual SIMADE</b>. Ada yang bisa saya bantu tentang Desa Dongkal?",'bot');
            }
        });
    } else {
        if(confirm('Apakah Anda yakin ingin menghapus semua chat?')){
            messages.innerHTML='';
            localStorage.removeItem('chatHistory');
            appendMessage("👋 Halo! Saya <b>asisten virtual SIMADE</b>. Ada yang bisa saya bantu tentang Desa Dongkal?",'bot');
        }
    }
});

function sendMessage(){
    const text=input.value.trim();
    if(!text) return;

    appendMessage(text,'user');
    input.value='';

    setInputState(false);

    const typing=showTyping();

    fetch(CHATBOT_API_URL,{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        body:JSON.stringify({question:text})
    }).then(res=>res.json()).then(data=>{
        typing.remove();
        appendMessage(data.answer,'bot');
    }).catch(error => {
        console.error('Fetch Error:', error);
        typing.remove();
        appendMessage('⚠️ Maaf, terjadi kesalahan koneksi ke server 😅','bot');
    }).finally(() => {
        setInputState(true);
        input.focus();
    });
}
</script>

