$(window).load(() => {
  $('.wall-loading').delay(100).fadeOut('slow')
  $('.spinner').delay(100).fadeOut('slow')
  $('.wall-loading').css('z-index', -20)
})
$('#load_pdf embed').ready(() => {
  $('.wall-loading').delay(100).fadeOut('slow')
  $('.spinner').delay(100).fadeOut('slow')
  $('.wall-loading').css('z-index', -20)
})