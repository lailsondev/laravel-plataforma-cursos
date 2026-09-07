export default (route) => {
    return {
        replyTo: '',
        reply: '',
        loading: false,
        commentId: '',
        error: '',
        success: '',
        init() {
            this.$refs.dialog.addEventListener('close', () => {
                this.reset();
            })
        },
        async sendReply() {
            if (!this.commentId) {
                this.error = 'ID do comentário vazio - clique em Responder novamente (commentId=' + this.commentId + ')';
                return;
            }
            if (!this.reply || this.reply.trim().length < 3) {
                this.error = 'Escreva uma resposta com pelo menos 3 caracteres';
                return;
            }
            this.loading = true;
            this.error = '';
            this.success = '';
            try {
                const csrf_token = document.querySelector(`meta[name='csrf-token']`).content;
                console.log('Enviando reply:', {reply: this.reply, commentId: this.commentId});
                const response = await fetch(route, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf_token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        reply: this.reply,
                        commentId: this.commentId
                    })
                })

                let data;
                try { data = await response.json(); } catch(e) { data = {}; }
                if (!response.ok) {
                    this.loading = false;
                    if (response.status === 422) {
                        this.error = data.errors?.reply?.[0] ?? data.errors?.commentId?.[0] ?? Object.values(data.errors || {}).flat()[0] ?? 'Erro de validação';
                        return;
                    }
                    if (response.status === 419) {
                        this.error = 'Sessão expirada, recarregue a página (419)';
                        return;
                    }
                    if (response.status === 401) {
                        this.error = 'Você precisa estar logado (401)';
                        return;
                    }
                    this.error = data.message ?? `Erro ${response.status}: ${response.statusText || 'inesperado'}`;
                    return;
                }

                this.loading = false;
                this.error = '';
                this.success = data;

                setTimeout(() => {
                    this.reset();
                    window.location.reload();
                }, 2000);
            } catch(e) {
                this.loading = false;
                this.error = e.message || 'Erro de rede';
            }
        },
        reset() {
            this.loading = false;
            this.error = '';
            this.success = '';
            this.reply = '';
        },
        modalReply(event) {
            this.replyTo = event.detail.replyTo;
            this.commentId = event.detail.commentId;
            setTimeout(() => {
                this.$refs.textarea.focus();
            }, 200);
        }
    }
}
