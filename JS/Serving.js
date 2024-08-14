const container = document.querySelector('.container')
const sidebar = document.querySelector('.sidebar')
const slider = document.querySelector('.main-slider')
const upBtn = document.querySelector('.up-button')
const downBtn = document.querySelector('.down-button')
const slidesCount = slider.querySelectorAll('.slide').length
let activeSlideIndex = 0

function initSidebar() {
  sidebar.style.top = `-${(slidesCount - 1) * 100}vh`
}

function changeSlide(direction) {
  if (direction === 'up') {
    activeSlideIndex += 1
    if (activeSlideIndex === slidesCount)
      activeSlideIndex = 0
  }

  if (direction === 'down') {
    activeSlideIndex -= 1
    if (activeSlideIndex < 0)
      activeSlideIndex = slidesCount - 1
  }

  const sliderHeight = container.clientHeight

  slider.style.transform = `translateY(-${activeSlideIndex * sliderHeight}px)`
  sidebar.style.transform = `translateY(${activeSlideIndex * sliderHeight}px)`
}

upBtn.addEventListener('click', changeSlide.bind(null, 'up'))
downBtn.addEventListener('click', changeSlide.bind(null, 'down'))

initSidebar()