function changePerPage(perPage) {
    window.location.href = "{{ route('user') }}?perPage=" + perPage;
}
function changePerPage(perPageCategory) {
    window.location.href = "{{ route('category') }}?perPage=" + perPageCategory;
}
