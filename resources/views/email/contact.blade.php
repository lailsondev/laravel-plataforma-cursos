<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
</head>
<body style="background:#f3f4f6;padding:24px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI', Roboto,Helvetica,Arial,sans-serif;
  background:#f3f4f6;
  padding:24px;">

<div style="
        max-width:600px;
        margin:0 auto;
        background:#ffffff;
        border-radius:8px;
        padding:32px;
    ">

    <h1 style="font-size:22px;margin-bottom:16px;">
        Novo contato 📩
    </h1>

    <p>
        Você acabou de receber um e-mail de
        <strong>{{ $data['name'] }}</strong>.
    </p>

    <p style="
            background:#e5e7eb;
            padding:16px;
            border-radius:6px;
            margin:24px 0;
        ">
        {{ $data['message'] }}
    </p>

    <p>
        Abraços,<br>
        Equipe {{ config('app.name') }}
    </p>

    <p style="padding:20px 32px;
                        background-color:#f8fafc;
                        font-size:18px;
                        color:#94a3b8;
                        text-align:center;">
        © {{ date('Y') }} {{ config('app.name') }} · Todos os direitos reservados
    </p>

</div>

</body>
</html>
