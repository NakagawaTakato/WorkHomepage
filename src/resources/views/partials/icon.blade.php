<svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" aria-hidden="true">
  @switch($name)
    @case('chat')
      <path d="M4 4h16a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-8l-5 4v-4H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" />
      <circle cx="8" cy="10.500" r="1.200" fill="#fff" />
      <circle cx="12" cy="10.500" r="1.200" fill="#fff" />
      <circle cx="16" cy="10.500" r="1.200" fill="#fff" />
      @break
    @case('person')
      <circle cx="12" cy="8" r="4" />
      <path d="M4 21c0-4.400 3.600-7 8-7s8 2.600 8 7z" />
      @break
    @case('code')
      <rect x="3" y="5" width="18" height="14" rx="2.500" />
      <path d="M10 9l-3 3 3 3M14 9l3 3-3 3" fill="none" stroke="#fff" stroke-width="1.800" stroke-linecap="round" stroke-linejoin="round" />
      @break
    @case('store')
      <path d="M3 9l1.500-5h15L21 9a3 3 0 0 1-6 0 3 3 0 0 1-6 0 3 3 0 0 1-6 0z" />
      <path d="M5 13h14v7h-5v-4h-4v4H5z" />
      @break
    @case('building')
      <path fill-rule="evenodd" d="M6 3h12v18h-4v-4h-4v4H6zM9 6v2h2V6zm4 0v2h2V6zM9 10v2h2v-2zm4 0v2h2v-2z" />
      @break
    @case('window')
      <path fill-rule="evenodd" d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zM6 11v2h7v-2zm0 4v1.500h5V15zm9-4v2h3v-2z" />
      @break
    @case('gear')
      <circle cx="12" cy="12" r="8" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="3.140 3.140" />
      <circle cx="12" cy="12" r="5" fill="none" stroke="currentColor" stroke-width="3.500" />
      @break
    @case('pencil')
      <path d="M4 20l1-4L16 5l3 3L8 19zM17.500 3.500l3 3-1.500 1.500-3-3z" />
      @break
    @case('graduation')
      <path d="M12 4L1 9l11 5 9-4.090V16h2V9zM5 12.500V16c0 1.700 3.100 3 7 3s7-1.300 7-3v-3.500l-7 3.200z" />
      @break
    @case('rocket')
      <path d="M12 2c3 2.500 4.500 6 4.500 9.500L18 15v3h-3l-1 2h-4l-1-2H6v-3l1.500-3.500C7.500 8 9 4.500 12 2z" />
      <circle cx="12" cy="10" r="1.800" fill="#fff" />
      @break
    @case('trophy')
      <path fill-rule="evenodd" d="M7 3h10v2h3v3a4 4 0 0 1-4 4h-.500A5 5 0 0 1 13 14.900V18h3v3H8v-3h3v-3.100A5 5 0 0 1 8.500 12H8a4 4 0 0 1-4-4V5h3zM6 7v1a2 2 0 0 0 1 1.700V7zm11 0v2.700A2 2 0 0 0 18 8V7z" />
      @break
    @case('yen')
      <path d="M7 4l5 7 5-7M12 11v9M8 13h8M8 16.500h8" fill="none" stroke="currentColor" stroke-width="2.200" stroke-linecap="round" stroke-linejoin="round" />
      @break
    @case('coin')
      <circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2" />
      <circle cx="12" cy="12" r="5.500" />
      @break
    @case('document')
      <path d="M6 2h8l5 5v15H6z" />
      <path d="M9 12h6M9 15h6M9 18h4" fill="none" stroke="#fff" stroke-width="1.500" stroke-linecap="round" />
      @break
    @case('check')
      <circle cx="12" cy="12" r="10" />
      <path d="M7.500 12.500l3 3 6-6.500" fill="none" stroke="#fff" stroke-width="2.200" stroke-linecap="round" stroke-linejoin="round" />
      @break
    @case('mail')
      <rect x="2" y="5" width="20" height="14" rx="2" />
      <path d="M3.500 7.500l8.500 6 8.500-6" fill="none" stroke="#fff" stroke-width="1.800" stroke-linecap="round" stroke-linejoin="round" />
      @break
    @case('clock')
      <circle cx="12" cy="12" r="8.500" fill="none" stroke="currentColor" stroke-width="2" />
      <path d="M12 7.500V12l3 2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      @break
    @case('question')
      <path d="M4 4h16a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-8l-5 4v-4H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" />
      <path d="M9.800 8.600a2.300 2.300 0 1 1 3.300 2.100c-.700.400-1.100.800-1.100 1.600" fill="none" stroke="#fff" stroke-width="1.600" stroke-linecap="round" />
      <circle cx="12" cy="14.600" r="1" fill="#fff" />
      @break
  @endswitch
</svg>
