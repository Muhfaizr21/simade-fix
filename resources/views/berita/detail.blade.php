@extends('layouts.main')

@section('content')

{{-- HERO TITLE CNN STYLE --}}
<section class="py-5" style="background:#fafafa; border-bottom:1px solid #e5e7eb;">
    <div class="container">

        <p class="text-muted mb-2" style="font-size: .9rem;">
            <a href="/berita" style="color:#777; text-decoration:none;">Berita</a>
            <span class="mx-2">›</span>
            <span style="color:#e63946;">{{ $berita->judul }}</span>
        </p>

        <h1 class="fw-bold mb-3" style="font-size:2.6rem; line-height:1.2;">
            {{ $berita->judul }}
        </h1>

        <div class="text-muted" style="font-size: .9rem;">
            <i class="bi bi-stopwatch"></i> {{ $berita->created_at->diffForHumans() }}
            <span class="mx-2">•</span>
            <i class="bi bi-person-fill"></i> {{ $berita->user->name }}
            <span class="mx-2">•</span>
            <i class="bi bi-fire"></i> Dibaca {{ $berita->views }} kali
        </div>

    </div>
</section>


{{-- MAIN CONTENT --}}
<section class="py-4" style="background:white;">
    <div class="container">
        <div class="row">

            {{-- LEFT ARTICLE --}}
            <div class="col-lg-8 mb-5">

                {{-- MAIN IMAGE --}}
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                     class="img-fluid rounded mb-4"
                     style="width:100%; max-height:480px; object-fit:cover;">

                {{-- BODY --}}
                <article class="mb-5" style="font-size:1.1rem; line-height:1.7; color:#333;">
                    {!! $berita->body !!}
                </article>

                {{-- CATEGORY TAG --}}
                <div class="mb-4">
                    <span class="badge bg-danger px-3 py-2" style="font-size:.85rem;">
                        <i class="bi bi-tag"></i> {{ $berita->kategori->kategori }}
                    </span>
                </div>


                {{-- ================= COMMENTS ================= --}}
                <hr class="my-5">

                <h4 class="fw-bold mb-4">Komentar Pembaca</h4>

                @foreach ($berita->comments as $comment)
                    @php
                        $emailHash = md5(strtolower(trim($comment->email)));
                        $avatarUrl = "https://www.gravatar.com/avatar/{$emailHash}?s=65";
                    @endphp

                    {{-- COMMENT --}}
                    <div class="d-flex mb-4">
                        <img src="{{ $avatarUrl }}" width="55" height="55"
                             class="rounded-circle me-3 shadow-sm">

                        <div class="flex-grow-1">
                            <h6 class="fw-semibold mb-0">{{ $comment->nama }}</h6>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            <p class="mt-2">{{ $comment->body }}</p>

                            <a href="javascript:void(0)"
                               onclick="toggleReplyForm({{ $comment->id }})"
                               style="font-size:.85rem; color:#e63946; text-decoration:none;">
                                <i class="bi bi-reply-fill"></i> Balas
                            </a>

                            {{-- REPLIES --}}
                            @foreach ($comment->replies as $reply)
                                @php
                                    $replyHash = md5(strtolower(trim($reply->email)));
                                    $replyAvatar = "https://www.gravatar.com/avatar/{$replyHash}?s=55";
                                @endphp

                                <div class="d-flex mt-4 ms-5">
                                    <img src="{{ $replyAvatar }}" width="45" height="45"
                                         class="rounded-circle me-3 shadow-sm">

                                    <div class="flex-grow-1">
                                        <h6 class="fw-semibold mb-0">{{ $reply->nama }}</h6>
                                        <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                        <p class="mt-2">{{ $reply->body }}</p>
                                    </div>
                                </div>
                            @endforeach

                            {{-- REPLY FORM --}}
                            <div id="replyForm{{ $comment->id }}" class="mt-3 p-3 border rounded"
                                 style="display:none; background:#fafafa;">
                                <form action="/berita/{{ $berita->slug }}/reply" method="POST">
                                    @csrf
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                                    <input type="text" class="form-control mb-2" placeholder="Nama" name="replyNama">
                                    <input type="email" class="form-control mb-2" placeholder="Email" name="replyEmail">
                                    <textarea class="form-control mb-2" placeholder="Balasan" rows="3" name="replyBody"></textarea>

                                    <button class="btn btn-danger btn-sm">Kirim Balasan</button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach


                {{-- COMMENT FORM --}}
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Tinggalkan Komentar</h5>

                        <form method="POST" action="/berita/{{ $berita->slug }}">
                            @csrf

                            <input type="text" name="nama" class="form-control mb-3" placeholder="Nama">
                            <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                            <textarea name="body" class="form-control mb-3" rows="6" placeholder="Komentar..."></textarea>

                            <button class="btn btn-danger float-end">Kirim Komentar</button>
                        </form>
                    </div>
                </div>

            </div>


            {{-- RIGHT SIDEBAR --}}
            <div class="col-lg-4">

                {{-- POPULAR NEWS --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Berita Populer</h5>

                        @foreach ($beritaPopuler as $berita)
                            <div class="d-flex mb-3">
                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                     width="110" height="80"
                                     class="rounded me-3"
                                     style="object-fit:cover;">

                                <a href="/berita/{{ $berita->slug }}" style="text-decoration:none; color:#111;">
                                    <h6 class="fw-semibold mb-1">{{ $berita->judul }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


                {{-- CATEGORY LIST --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Kategori</h5>

                        @foreach ($kategories as $kategori)
                            <p class="mb-2">
                                <i class="bi bi-hash"></i>
                                <a href="/kategori/{{ $kategori->slug }}" style="text-decoration:none; color:#111;">
                                    {{ $kategori->kategori }}
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


<script>
    function toggleReplyForm(id) {
        const form = document.getElementById('replyForm' + id);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>

@endsection
