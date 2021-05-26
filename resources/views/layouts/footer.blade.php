<footer class="footer">
    <div class=" container-fluid ">
        <nav>
            <ul>
                <li>
                    <a href="https://github.com/alemelgarejo" target="_blank">
                        {{ __(' Alejandro Melgarejo') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('web.about') }}" target="_blank">
                        {{ __('messages.About Us') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('web.index') }}" target="_blank">
                        {{ __(' Web') }}
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright" id="copyright">
            &copy;
            <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))

            </script>
            <a href="https://github.com/alemelgarejo" style="color: #2CA8FF"
                target="_blank">{{ __(' Alejandro Melgarejo') }}</a>
        </div>
    </div>
</footer>
