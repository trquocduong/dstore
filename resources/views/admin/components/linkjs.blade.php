<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script>
function changePerPage(perPage) {
  window.location.href = "{{ route('user') }}?perPage=" + perPage;
}
function changePerPageCategory(perPageCategory) {
  window.location.href = "{{ route('category') }}?perPage=" + perPageCategory;
}
function changePerPageProducts(perPageProducts) {
  window.location.href = "{{ route('product') }}?perPage=" + perPageProducts;
}
</script>


<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src={{asset("assets/js/argon-dashboard.min.js?v=2.0.4")}}></script>