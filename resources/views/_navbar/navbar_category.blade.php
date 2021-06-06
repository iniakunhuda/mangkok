@php
    $header_cats = \App\Models\Category::orderBy('name', 'ASC')->get();
@endphp

<ul class="list">
    <li onclick="changeCategoryNavbar('Semua Kategori')" class="category-option">
        <a href="javascript:void(0);">
            Semua Kategori
        </a>
    </li>
    @foreach($header_cats as $ct)
    <li onclick="changeCategoryNavbar('{{ $ct->name }}')" class="category-option">
        <a href="javascript:void(0);">
          {{ $ct->name }}
        </a>
    </li>
    @endforeach
    
    {{-- <li class="category-option"><a>Fresh</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
        <ul>
            <li> <a href="#">Meat & Poultry</a>
            </li>
            <li> <a href="#">Fruit</a>
            </li>
            <li> <a href="#">Vegetables</a>
            </li>
            <li> <a href="#">Milks, Butter & Eggs</a>
            </li>
            <li> <a href="#">Fish</a>
            </li>
            <li> <a href="#">Frozen</a>
            </li>
            <li> <a href="#">Cheese</a>
            </li>
            <li> <a href="#">Pasta & Sauce</a>
            </li>
        </ul>
    </li> --}}
</ul>

@push('js')
<script>
    function changeCategoryNavbar(val) {
        $('#topbar_search_category_value').val(val);
        $('#topbar_search_category_label').text(val);
    }
</script>
@endpush