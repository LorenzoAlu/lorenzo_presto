<form class="d-flex justify-content-center form-search" action="{{route('announcements.search')}}" method="GET">
    <input class=" btn bg-white rounded-pill input-shadow border-search-input" type="text" name="q" placeholder="{{__('ui.search_announcements')}}">
    <button class="btn btn-card rounded-pill input-shadow btn-position-search border-search-button" type="submit"> <i class="fas fa-search text-white"></i> </button>
</form>