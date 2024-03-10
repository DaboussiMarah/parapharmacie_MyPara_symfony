 {% if app.user %}
                <div class="logged-in-user">
                    <span class="user-greeting">Welcome, {{ app.user.email}}!</span>
                    <a href="{{ path('app_logout') }}" class="nav-item nav-link">Logout</a>
                </div>
            {% else %}
                <div class="login-register-links">
                    <a href="{{ path('app_login') }}" class="nav-item nav-link">Login</a>
                    <a href="{{ path('app_register') }}" class="nav-item nav-link">Register</a>
                </div>
            {% endif %}