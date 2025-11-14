<style>
/* ===============================
   FLOATING BUTTON — MODERN DESIGN
================================== */
#chatbot-button {
    position: fixed;
    bottom: 25px;
    right: 25px;
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    border-radius: 18px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 8px 32px rgba(37, 99, 235, 0.3);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 99999;
    border: none;
    overflow: hidden;
}

#chatbot-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.7s ease;
}

#chatbot-button:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 12px 40px rgba(37, 99, 235, 0.4);
}

#chatbot-button:hover::before {
    left: 100%;
}

#chatbot-button svg {
    width: 28px;
    height: 28px;
    stroke: #ffffff;
    stroke-width: 2;
    position: relative;
    z-index: 2;
}

/* Pulse animation */
@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(37, 99, 235, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
    }
}

#chatbot-button.pulse {
    animation: pulse 2s infinite;
}

/* ===============================
   CHATBOX MODERN DESIGN
================================== */
#chatbot-box {
    position: fixed;
    bottom: 100px;
    right: 25px;
    width: 380px;
    height: 520px;
    background: #ffffff;
    border-radius: 20px;
    display: none;
    flex-direction: column;
    border: 1px solid #e2e8f0;
    box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    overflow: hidden;
    z-index: 99999;
    transform: translateY(20px);
    opacity: 0;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

#chatbot-box.show {
    transform: translateY(0);
    opacity: 1;
}

/* Header */
#chatbot-header {
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    padding: 16px 20px;
    font-weight: 700;
    font-size: 16px;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

#chatbot-header span {
    display: flex;
    align-items: center;
    gap: 8px;
}

#chatbot-header button {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 8px;
    color: #fff;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    backdrop-filter: blur(10px);
}

#chatbot-header button:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

#chatbot-header button svg {
    width: 16px;
    height: 16px;
    stroke: #fff;
}

/* Messages area */
#chatbot-messages {
    padding: 16px;
    overflow-y: auto;
    flex-grow: 1;
    background: #f8fafc;
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 #f1f5f9;
}

#chatbot-messages::-webkit-scrollbar {
    width: 6px;
}

#chatbot-messages::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

#chatbot-messages::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

#chatbot-messages::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

.bubble {
    display: flex;
    align-items: flex-start;
    margin-bottom: 16px;
    animation: fadeInUp 0.3s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.avatar-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 12px;
    flex-shrink: 0;
    font-weight: 600;
    font-size: 14px;
}

.bot .avatar-icon {
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    color: white;
}

.user .avatar-icon {
    background: linear-gradient(135deg, #475569, #64748b);
    color: white;
}

.avatar-icon svg {
    width: 18px;
    height: 18px;
    stroke: #fff;
}

.message {
    padding: 12px 16px;
    border-radius: 18px;
    max-width: 260px;
    line-height: 1.5;
    font-size: 14px;
    position: relative;
    word-wrap: break-word;
}

.bot .message {
    background: #ffffff;
    color: #1e293b;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.user .message {
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    color: #ffffff;
    box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
}

.delete-message-btn {
    background: none;
    border: none;
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    margin-left: 8px;
    cursor: pointer;
    padding: 2px;
    border-radius: 4px;
    transition: all 0.2s ease;
}

.delete-message-btn:hover {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.1);
}

/* Typing indicator */
.typing {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #64748b;
    padding: 12px 16px;
    background: #ffffff;
    border-radius: 18px;
    border: 1px solid #e2e8f0;
    max-width: 120px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.typing span {
    animation: typing 1.4s infinite;
}

.typing span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typing {
    0%, 60%, 100% {
        opacity: 0.3;
    }
    30% {
        opacity: 1;
    }
}

/* Input area */
#chatbot-input-area {
    padding: 16px;
    display: flex;
    gap: 12px;
    background: white;
    border-top: 1px solid #e2e8f0;
    align-items: center;
}

#chatbot-input {
    flex: 1;
    padding: 12px 16px;
    border-radius: 12px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    outline: none;
    color: #1e293b;
    font-size: 14px;
    transition: all 0.2s ease;
}

#chatbot-input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

#chatbot-input::placeholder {
    color: #94a3b8;
}

#chatbot-send {
    width: 44px;
    height: 44px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

#chatbot-send:hover:not(:disabled) {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

#chatbot-send:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
}

#chatbot-send svg {
    width: 18px;
    height: 18px;
    stroke: #fff;
}

/* Responsive */
@media (max-width: 480px) {
    #chatbot-box {
        width: calc(100vw - 40px);
        right: 20px;
        bottom: 80px;
        height: 60vh;
    }

    #chatbot-button {
        bottom: 20px;
        right: 20px;
        width: 56px;
        height: 56px;
    }

    .message {
        max-width: 220px;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    #chatbot-box {
        background: #1e293b;
        border-color: #334155;
    }

    #chatbot-messages {
        background: #0f172a;
    }

    .bot .message {
        background: #334155;
        color: #f1f5f9;
        border-color: #475569;
    }

    #chatbot-input {
        background: #1e293b;
        border-color: #334155;
        color: #f1f5f9;
    }

    #chatbot-input::placeholder {
        color: #64748b;
    }

    .typing {
        background: #334155;
        border-color: #475569;
        color: #94a3b8;
    }
}
</style>

<!-- ============================================= -->
<!-- HTML CHATBOT DENGAN SVG YANG BENAR -->
<!-- ============================================= -->
<div id="chatbot-button" class="pulse">
    <!-- Chat Icon SVG -->
    <svg viewBox="0 0 24 24" fill="none">
        <path d="M3 20l1.3-3.9A8 8 0 1 1 12 20H3z" stroke="currentColor"></path>
    </svg>
</div>

<div id="chatbot-box">
    <div id="chatbot-header">
        <span>
            <!-- Bot Icon SVG -->
            <svg viewBox="0 0 24 24" fill="none" width="16" height="16">
                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2Z" fill="currentColor"/>
                <path d="M9 7C8.4 7 8 7.4 8 8V14C8 14.6 8.4 15 9 15H15C15.6 15 16 14.6 16 14V8C16 7.4 15.6 7 15 7H9Z" fill="currentColor"/>
                <path d="M18 12C18.6 12 19 12.4 19 13V19C19 19.6 18.6 20 18 20H6C5.4 20 5 19.6 5 19V13C5 12.4 5.4 12 6 12H18Z" fill="currentColor"/>
            </svg>
            SIMADE AI
        </span>
        <button id="chatbot-clear" title="Hapus riwayat chat">
            <!-- Trash Icon SVG -->
            <svg viewBox="0 0 24 24" fill="none">
                <path d="M3 6h18M8 6v14m8-14v14M5 6l1-3h12l1 3" stroke="currentColor" stroke-width="2"/>
            </svg>
        </button>
    </div>

    <div id="chatbot-messages"></div>

    <div id="chatbot-input-area">
        <input id="chatbot-input" type="text" placeholder="Ketik pesan...">
        <button id="chatbot-send" disabled title="Kirim pesan">
            <!-- Send Icon SVG -->
            <svg viewBox="0 0 24 24" fill="none">
                <path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z" stroke="currentColor" stroke-width="2"/>
            </svg>
        </button>
    </div>
</div>

<script>
// JavaScript yang sudah diperbaiki dengan animasi
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
        bubbleToDelete.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            bubbleToDelete.remove();
            saveChatHistory();
        }, 300);
    }
}

function appendMessage(text,sender){
    const bubble=document.createElement('div');
    bubble.classList.add('bubble',sender);

    const avatar=document.createElement('div');
    avatar.classList.add('avatar-icon');

    // Gunakan teks sebagai fallback untuk avatar
    if(sender === 'user') {
        avatar.textContent = '👤';
    } else {
        avatar.textContent = '🤖';
    }

    const msg=document.createElement('div');
    msg.classList.add('message');
    msg.innerHTML=text.replace(/\n/g, '<br>');

    const deleteBtn = document.createElement('button');
    deleteBtn.classList.add('delete-message-btn');
    deleteBtn.innerHTML = '×';
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

// Load chat history
window.addEventListener('load', () => {
    const history = JSON.parse(localStorage.getItem('chatHistory')) || [];
    if(history.length === 0){
        appendMessage("👋 Halo! Saya <b>asisten virtual SIMADE</b>. Ada yang bisa saya bantu tentang Desa Dongkal?",'bot');
    } else {
        history.forEach(msg => appendMessage(msg.text, msg.sender));
    }
    sendButton.disabled = false;
});

// Toggle chatbox dengan animasi
button.addEventListener('click',() => {
    if(box.style.display === 'none' || box.style.display === '') {
        box.style.display = 'flex';
        setTimeout(() => {
            box.classList.add('show');
            input.focus();
        }, 10);
    } else {
        box.classList.remove('show');
        setTimeout(() => {
            box.style.display = 'none';
        }, 300);
    }
    messages.scrollTo({top:messages.scrollHeight,behavior:'smooth'});
});

// Event listeners
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

// Clear chat history
document.getElementById('chatbot-clear').addEventListener('click',()=>{
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Hapus Riwayat Chat?',
            text: "Riwayat chat Anda akan hilang permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
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

// CSS untuk animasi fadeOut
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeOut {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform: translateY(-10px); }
    }
`;
document.head.appendChild(style);
</script>
