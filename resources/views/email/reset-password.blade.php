<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Redefinir senha</title>
</head>
<body style="background-color:#f4f4f7; margin:0; padding:0; font-family:Arial, sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="padding: 40px 0;">

            <!-- Container -->
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; padding:40px;">
                <tr>
                    <td align="center" style="font-size:24px; font-weight:bold; color:#333;">
                        Redefinir sua senha
                    </td>
                </tr>

                <tr>
                    <td style="padding-top:20px; font-size:16px; color:#555; line-height:1.6;">
                        Olá {{ $user->firstName }}! Recebemos um pedido para redefinir sua senha.
                        <br><br>
                        Clique no botão abaixo para escolher uma nova senha.
                    </td>
                </tr>

                <!-- Button -->
                <tr>
                    <td align="center" style="padding-top:30px; padding-bottom:30px;">
                        <a href="{{ $url }}"
                           style="background-color:#2563eb; color:#ffffff; padding:14px 24px; border-radius:6px; font-size:16px; text-decoration:none; display:inline-block;">
                            Redefinir Senha
                        </a>
                    </td>
                </tr>

                <tr>
                    <td style="font-size:14px; color:#777; line-height:1.5;">
                        Se você não pediu a redefinição da senha, ignore este e-mail.
                        <br>
                        Este link expira em **60 minutos**.
                    </td>
                </tr>

                <tr>
                    <td style="padding-top:30px; font-size:13px; color:#999; border-top:1px solid #eee; padding-top:20px;">
                        © {{ date('Y') }} Seu Projeto. Todos os direitos reservados.
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</body>
</html>
