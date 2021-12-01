const signinModal = document.getElementById('signin-modal')
const signupModal = document.getElementById('signup-modal')

const signinButton = document.getElementById('signin-button')
const signupButton = document.getElementById('signup-button')

const closeSigninModal = document.getElementById('close-signin-modal')
const closeSignupModal = document.getElementById('close-signup-modal')

const openSigninModal = document.getElementById('open-signin')

const clearErrors = () => {
  const errors = document.querySelectorAll('.error')
  errors?.forEach((elem) => elem?.remove())
}

closeSigninModal?.addEventListener('click', () => {
  signinModal.style.display = 'none'
  clearErrors()
})

closeSignupModal?.addEventListener('click', () => {
  signupModal.style.display = 'none'
  clearErrors()
})

signinButton?.addEventListener('click', () => {
  signinModal.style.display = 'none'
  signupModal.style.display = 'flex'
  clearErrors()
})

signupButton?.addEventListener('click', () => {
  signinModal.style.display = 'flex'
  signupModal.style.display = 'none'
  clearErrors()
})

openSigninModal?.addEventListener('click', () => {
  signinModal.style.display = 'flex'
})
