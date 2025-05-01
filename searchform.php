<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input 
        type="search" 
        class="search-field" 
        placeholder="Search…" 
        value="<?php echo get_search_query(); ?>" 
        name="s" 
        aria-label="Search"
    />
    <button type="submit" class="search-submit">
        <span class="screen-reader-text">Search</span>
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.67188 0.671997C5.37187 0.671997 2.67188 3.372 2.67188 6.672C2.67188 8.072 3.17188 9.372 3.97188 10.372L0.171875 14.172L1.27187 15.272L5.07187 11.472C6.07187 12.272 7.37188 12.772 8.77188 12.772C12.0719 12.772 14.7719 10.072 14.7719 6.772C14.7719 3.472 11.9719 0.671997 8.67188 0.671997ZM8.67188 11.172C6.17188 11.172 4.17188 9.172 4.17188 6.672C4.17188 4.172 6.17188 2.172 8.67188 2.172C11.1719 2.172 13.1719 4.172 13.1719 6.672C13.1719 9.172 11.1719 11.172 8.67188 11.172Z" fill="#171822" />
        </svg>
    </button>
</form>