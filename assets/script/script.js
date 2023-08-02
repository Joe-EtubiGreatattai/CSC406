const readMoreBtn = document.getElementById('read-more-btn');
const fullText = document.getElementById('full-text');
const welcomeText = document.getElementById('welcome-text');

readMoreBtn.addEventListener('click', () => {
  fullText.classList.toggle('hidden');
  welcomeText.classList.toggle('line-clamp-4');
  if (fullText.classList.contains('hidden')) {
    readMoreBtn.innerText = 'See More';
  } else {
    readMoreBtn.innerText = 'See Less';
  }
});

function toggleText() {
  const longText = document.querySelector('.long-text');
  const shortText = document.querySelector('.short-text');
  const seeMoreButton = document.querySelector('.see-more-less');

  if (longText.classList.contains('hidden')) {
    longText.classList.remove('hidden');
    shortText.classList.add('hidden');
    seeMoreButton.textContent = 'See Less';
  } else {
    longText.classList.add('hidden');
    shortText.classList.remove('hidden');
    seeMoreButton.textContent = 'See More...';
  }
}


