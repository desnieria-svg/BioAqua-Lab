<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tentang Kami - BioAqua Lab</title>

<!-- Font modern -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: linear-gradient(135deg,#e0f7ff,#f0fbff,#ffffff);
    color:#0f172a;
}

/* background bubble */
.bubble{
    position:absolute;
    border-radius:50%;
    background:rgba(14,165,233,0.15);
    animation: float 8s infinite ease-in-out;
}
.b1{width:120px;height:120px;top:10%;left:5%;}
.b2{width:80px;height:80px;top:60%;left:80%;}
.b3{width:150px;height:150px;top:30%;left:60%;}
@keyframes float{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-20px);}
}

.container{
    max-width:900px;
    margin:auto;
    padding:80px 20px;
    position:relative;
    z-index:2;
}

/* glass card */
.card{
    background:rgba(255,255,255,0.7);
    backdrop-filter:blur(15px);
    border:1px solid rgba(255,255,255,0.4);
    border-radius:25px;
    padding:50px;
    box-shadow:0 20px 60px rgba(0,0,0,0.1);
    text-align:center;
    animation: fadeIn 1s ease;
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

h1{
    font-size:34px;
    margin-bottom:10px;
    background: linear-gradient(90deg,#0ea5e9,#38bdf8);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

p{
    color:#475569;
    line-height:1.8;
}

h2{
    margin-top:30px;
    color:#0ea5e9;
    font-size:20px;
}

ul{
    list-style:none;
    padding:0;
}

ul li{
    padding:8px 0;
    color:#334155;
}

/* button */
.btn{
    display:inline-block;
    margin-top:30px;
    padding:12px 25px;
    background:linear-gradient(90deg,#0ea5e9,#38bdf8);
    color:white;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
}

.btn:hover{
    transform:scale(1.05);
    box-shadow:0 10px 20px rgba(14,165,233,0.3);
}
</style>
</head>

<body>

<!-- bubble dekorasi -->
<div class="bubble b1"></div>
<div class="bubble b2"></div>
<div class="bubble b3"></div>

<div class="container">

    <div class="card">

        <h1>💧 Tentang BioAqua Lab</h1>

        <p>
            BioAqua Lab adalah penyedia air minum berkualitas tinggi yang berfokus pada
            kesehatan, kebersihan, dan kepercayaan pelanggan. Kami memastikan setiap tetes air
            yang Anda konsumsi benar-benar murni dan aman.
        </p>

        <h2>🌟 Visi</h2>
        <p>Menjadi penyedia air minum paling terpercaya dan modern di Indonesia.</p>

        <h2>🎯 Misi</h2>
        <ul>
            <li>✔ Menyediakan air minum higienis & berkualitas tinggi</li>
            <li>✔ Memberikan pelayanan cepat dan profesional</li>
            <li>✔ Menggunakan teknologi penyaringan modern</li>
        </ul>

        <h2>🚀 Kenapa Pilih Kami?</h2>
        <p>
            BioAqua Lab sudah dipercaya ribuan pelanggan dengan sistem modern,
            kualitas terjamin, dan pelayanan cepat sampai ke rumah Anda.
        </p>

        <a href="/" class="btn">← Kembali ke Home</a>

    </div>

</div>

</body>
</html>
