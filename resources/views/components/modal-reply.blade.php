<el-dialog
    x-data="reply('{{ route('reply.store') }}')"
    @modal-reply.window="modalReply(event)">
    <dialog x-ref="dialog" id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
            <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="size-6 text-red-600">
                                <path d="M21 12c0 4-3.8 7-9 7-1.2 0-2.4-.2-3.5-.6L3 20l1.4-3.2C3.5 15.3 3 13.7 3 12c0-4 3.8-7 9-7s9 3 9 7z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Respondendo <span x-text="replyTo"></span></h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-400 mb-3">Preencha o campo abaixo com sua resposta</p>
                                <template x-if="error">
                                    <div x-text="error" class="text-red-600 italic text-sm"></div>
                                </template>

                                <template x-if="success">
                                    <div x-text="success" class="text-green-600 italic text-sm"></div>
                                </template>
                                <textarea x-ref="textarea" x-model="reply" rows="8" placeholder="Escreva sua resposta aqui..." class="w-full min-h-[100px] max-h-60 resize-none rounded-md border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500" aria-describedby="reply-desc"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button
                        @click="sendReply()"
                        :disabled="loading"
                        type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                        <span x-show="loading">Respondendo...</span>
                        <span x-show="!loading">Responder</span>
                    </button>
                    <button type="button" command="close" commandfor="dialog" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto cursor-pointer">Fechar</button>
                </div>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>
