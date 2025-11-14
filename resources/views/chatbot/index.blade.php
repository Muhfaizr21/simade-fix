<style>
/* Variabel Warna disesuaikan dengan dashboard Anda (Indigo: #1e40af) */
:root {
    --primary: #1e40af;
    --chat-bg: #fff;
    --input-bg: #f8fafc; /* Latar belakang area input */
    --text-color: #000;
    --primary-gradient: linear-gradient(135deg, #1e40af, #06b6d4);
    --bot-bubble: #fff; /* Bubble Bot Putih */
}

/* ------------------------------------------------------------- */
/* BUTTON CHATBOT */
/* ------------------------------------------------------------- */
#chatbot-button {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 55px; height: 55px;
    border-radius: 50%;
    display: flex; justify-content: center; align-items: center;
    font-size: 24px;
    cursor: pointer;
    background: var(--primary);
    color: #fff;
    box-shadow: 0 4px 15px rgba(30, 64, 175, 0.4);
    transition: all 0.3s ease;
    z-index: 9999;
}
#chatbot-button:hover { transform: scale(1.05); box-shadow: 0 6px 18px rgba(30, 64, 175, 0.6); }

/* ------------------------------------------------------------- */
/* CHAT WINDOW */
/* ------------------------------------------------------------- */
#chatbot-box {
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 350px;
    height: 480px;
    background: var(--chat-bg);
    border-radius: 15px;
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
    background: var(--primary);
    color: #fff;
    padding: 14px 20px;
    font-weight: bold; font-size: 16px;
    display: flex; justify-content: space-between; align-items: center;
}

#chatbot-clear {
    background: none; border:none; color:#fff; padding:4px 10px;
    cursor:pointer; font-size:18px;
    transition: 0.2s; opacity: 0.8;
}
#chatbot-clear:hover { opacity: 1; }

#chatbot-messages {
    flex: 1; padding:15px; display:flex; flex-direction:column; gap:12px;
    overflow-y:auto; background: #f8fafc; /* Latar belakang chat */
}

/* ------------------------------------------------------------- */
/* BUBBLE CHAT & HAPUS PESAN INDIVIDUAL */
/* ------------------------------------------------------------- */
.bubble {
    display:flex; align-items:flex-end; gap:8px; max-width:85%;
    animation: fadeInUp 0.3s ease-out;
    position: relative;
}
.bubble.user { align-self:flex-end; flex-direction: row-reverse; }
.bubble.bot { align-self:flex-start; }

/* AVATAR */
.bubble .avatar-icon {
    width:35px; height:35px; border-radius:50%;
    display: flex; justify-content: center; align-items: center;
    font-size: 18px; flex-shrink: 0;
}
.bubble.bot .avatar-icon { background: var(--primary); color: white; }
.bubble.user .avatar-icon { background: #e0e0e0; color: var(--text-color); }

.message {
    padding:10px 14px; border-radius:15px; line-height:1.4;
    box-shadow: 0 1px 5px rgba(0,0,0,0.08);
    word-wrap: break-word;
    position: relative;
    /* Tambahkan padding kanan untuk tombol hapus */
    padding-right: 25px;
}
.message.user {
    background: var(--primary); color:#fff;
    border-radius:15px 15px 0 15px;
}
.message.bot {
    background: var(--bot-bubble);
    color: var(--text-color);
    border-radius:15px 15px 15px 0;
    box-shadow: 0 1px 5px rgba(0,0,0,0.15);
}

/* Tombol Hapus Pesan Individual */
.delete-message-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    width: 15px;
    height: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    cursor: pointer;
    opacity: 0.5;
    color: var(--text-color);
    background: none;
    border: none;
    transition: opacity 0.2s;
}
.delete-message-btn:hover {
    opacity: 1;
    color: #ff4d4f;
}
.message.user .delete-message-btn {
    color: #fff;
}
.message.user .delete-message-btn:hover {
    color: #ffcccc;
}


/* ------------------------------------------------------------- */
/* TYPING INDICATOR */
/* ------------------------------------------------------------- */
.typing { font-style:italic; color:#94a3b8; font-size:13px; margin-left:45px; }
.typing span {
    display: inline-block;
    width: 5px; height: 5px;
    background-color: #94a3b8;
    border-radius: 50%;
    margin-left: 2px;
    animation: typing-dots 1s infinite alternate;
}
.typing span:nth-child(2) { animation-delay: 0.2s; }
.typing span:nth-child(3) { animation-delay: 0.4s; }
@keyframes typing-dots {
    from { opacity: 0.5; transform: scale(0.8); }
    to { opacity: 1; transform: scale(1.1); }
}

/* ------------------------------------------------------------- */
/* INPUT AREA */
/* ------------------------------------------------------------- */
#chatbot-input-area {
    display:flex; border-top:1px solid #e2e8f0; background: white;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}
#chatbot-input {
    flex:1; border:none; padding:12px 15px; outline:none; font-size:14px;
    background:transparent; color: var(--text-color);
}
#chatbot-send {
    background: var(--primary); color:#fff; border:none; padding:12px 18px;
    cursor:pointer; font-size:18px; transition:0.2s;
}
#chatbot-send:hover { background: #1d4ed8; }

::-webkit-scrollbar { width:6px; }
::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius:10px; }
</style>


<div id="chatbot-button" title="Buka Chatbot">
    <i class="ti ti-robot"></i>
</div>

<div id="chatbot-box">
    <div id="chatbot-header">
        <span>🤖 SIMADE AI</span>
        <button id="chatbot-clear" title="Hapus Riwayat Chat">
            <i class="ti ti-trash"></i>
        </button>
    </div>

    <div id="chatbot-messages"></div>

    <div id="chatbot-input-area">
        <input id="chatbot-input" type="text" placeholder="Ketik pesan...">
        <button id="chatbot-send" disabled>➤</button>
    </div>
</div>

<script>
// Pastikan SweetAlert2 (Swal) dimuat di layout utama Anda
const CHATBOT_API_URL = '/chatbot/ask';
const button = document.getElementById('chatbot-button');
const box = document.getElementById('chatbot-box');
const messages = document.getElementById('chatbot-messages');
const input = document.getElementById('chatbot-input');
const sendButton = document.getElementById('chatbot-send');

// -------------------------------------------------------------
// FUNGSI UTILITY
// -------------------------------------------------------------
function saveChatHistory(){
    const chatData=[];
    // Hanya ambil bubble yang valid
    messages.querySelectorAll('.bubble').forEach(b=>{
        const sender=b.classList.contains('user')?'user':'bot';
        // Mengambil innerText karena menyimpan HTML (misal <br>) dapat menimbulkan masalah
        const text=b.querySelector('.message').innerText;
        chatData.push({sender,text});
    });
    localStorage.setItem('chatHistory',JSON.stringify(chatData));
}

// FUNGSI BARU: Hapus Pesan Individu
function deleteIndividualMessage(event) {
    const bubbleToDelete = event.currentTarget.closest('.bubble');
    if (bubbleToDelete) {
        bubbleToDelete.remove();
        saveChatHistory(); // Simpan riwayat setelah penghapusan
    }
}

function appendMessage(text,sender){
    const bubble=document.createElement('div');
    bubble.classList.add('bubble',sender);

    // AVATAR: Menggunakan Ikon Tabler
    const avatar=document.createElement('div');
    avatar.classList.add('avatar-icon');
    avatar.innerHTML = sender === 'user' ? '<i class="ti ti-user"></i>' : '<i class="ti ti-robot"></i>';

    const msg=document.createElement('div');
    msg.classList.add('message',sender);
    // Ganti newline dengan <br>
    msg.innerHTML=text.replace(/\n/g, '<br>');

    // Tombol Hapus Pesan Individual
    const deleteBtn = document.createElement('button');
    deleteBtn.classList.add('delete-message-btn');
    deleteBtn.innerHTML = '<i class="ti ti-x"></i>';
    deleteBtn.title = 'Hapus pesan ini';
    // Menambahkan event listener ke tombol hapus
    deleteBtn.onclick = deleteIndividualMessage;

    // Pastikan hanya pesan user yang bisa dihapus jika Anda tidak ingin bot dihapus
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
    if (!enabled) sendButton.disabled = true; // Nonaktifkan tombol kirim saat loading
}


// -------------------------------------------------------------
// EVENT LISTENERS & INICIALISASI
// -------------------------------------------------------------
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


// Hapus Riwayat (SweetAlert2 / Fallback)
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


// -------------------------------------------------------------
// LOGIKA PENGIRIMAN PESAN
// -------------------------------------------------------------
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
        // Hapus indikator dan tampilkan jawaban
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
