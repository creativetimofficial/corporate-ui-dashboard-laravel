<x-guest-layout>

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <x-guest.sidenav-guest />
            </div>
        </div>
    </div>

    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="flex place-items-center">
                    <div class="max-w-md mx-auto text-center bg-white px-4 px-md-8 py-md-10 rounded-xl shadow">
                        <header class="mb-8">
                            <h1 class="text-xl font-bold mb-1">Mobile Phone Verification</h1>
                            <p class="text-[15px] text-slate-500">Enter the 4-digit verification code that was sent to your phone number.</p>
                        </header>
                        <form id="otp-form">
                            <div class="flex items-center justify-center gap-3">
                                <input
                                    type="text"
                                    class="w-8 h-8 text-center text-sm font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none "
                                    pattern="\d*" maxlength="1" />
                                <input
                                    type="text"
                                    class=" w-8 h-8 text-center text-sm font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                    maxlength="1" />
                                <input
                                    type="text"
                                    class="w-8 h-8 text-center text-sm font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                    maxlength="1" />
                                <input
                                    type="text"
                                    class="w-8 h-8 text-center text-sm font-extrabold text-slate-900 bg-slate-100 border border-transparent  appearance-none rounded p-4 s"
                                    maxlength="1" />
                            </div>
                            <div class="max-w-[260px] mx-auto mt-4">
                                <button type="submit"
                                    class="w-full btn btn-info rounded-pill  inline-flex justify-center whitespace-nowrap rounded-lg bg-indigo-500 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-indigo-950/10 hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 transition-colors duration-150">Verify
                                    Account</button>
                            </div>
                        </form>
                        <div class="text-sm text-slate-500 mt-4">Didn't receive code? <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">Resend</a></div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const form = document.getElementById('otp-form')
                            const inputs = [...form.querySelectorAll('input[type=text]')]
                            const submit = form.querySelector('button[type=submit]')
                    
                            const handleKeyDown = (e) => {
                                if (
                                    !/^[0-9]{1}$/.test(e.key)
                                    && e.key !== 'Backspace'
                                    && e.key !== 'Delete'
                                    && e.key !== 'Tab'
                                    && !e.metaKey
                                ) {
                                    e.preventDefault()
                                }
                    
                                if (e.key === 'Delete' || e.key === 'Backspace') {
                                    const index = inputs.indexOf(e.target);
                                    if (index > 0) {
                                        inputs[index - 1].value = '';
                                        inputs[index - 1].focus();
                                    }
                                }
                            }
                    
                            const handleInput = (e) => {
                                const { target } = e
                                const index = inputs.indexOf(target)
                                if (target.value) {
                                    if (index < inputs.length - 1) {
                                        inputs[index + 1].focus()
                                    } else {
                                        submit.focus()
                                    }
                                }
                            }
                    
                            const handleFocus = (e) => {
                                e.target.select()
                            }
                    
                            const handlePaste = (e) => {
                                e.preventDefault()
                                const text = e.clipboardData.getData('text')
                                if (!new RegExp(`^[0-9]{${inputs.length}}$`).test(text)) {
                                    return
                                }
                                const digits = text.split('')
                                inputs.forEach((input, index) => input.value = digits[index])
                                submit.focus()
                            }
                    
                            inputs.forEach((input) => {
                                input.addEventListener('input', handleInput)
                                input.addEventListener('keydown', handleKeyDown)
                                input.addEventListener('focus', handleFocus)
                                input.addEventListener('paste', handlePaste)
                            })
                        })                        
                    </script>
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>