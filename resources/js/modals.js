const signinModal = document.getElementById('signin-modal')
const signupModal = document.getElementById('signup-modal')
const addressModal = document.getElementById('address-modal')

const signinButton = document.getElementById('signin-button')
const signupButton = document.getElementById('signup-button')

const closeSigninModal = document.getElementById('close-signin-modal')
const closeSignupModal = document.getElementById('close-signup-modal')
const closeAddressModal = document.getElementById('close-address-modal')

const openSigninModal = document.getElementById('open-signin')
const openAddressModal = document.getElementById('open-address')

const closeButtonAddressModal = document.getElementById('close-address')

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

closeAddressModal?.addEventListener('click', () => {
  addressModal.style.display = 'none'
  clearErrors()
})

closeButtonAddressModal?.addEventListener('click', () => {
  addressModal.style.display = 'none'
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

openAddressModal?.addEventListener('click', () => {
  addressModal.style.display = 'flex'
})
