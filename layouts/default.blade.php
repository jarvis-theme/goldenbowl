<!DOCTYPE html>
<html>
    <head>
        {{ Theme::partial('seostuff') }} 
        {{ Theme::partial('defaultcss') }} 
        {{ Theme::asset()->styles() }} 
    </head>
    <body>
        <div class="container">
            {{ Theme::partial('header') }} 
            <div class="row">
                <div id="content">
                    {{ Theme::place('content') }} 
                </div>
                {{ Theme::partial('footer') }} 
            </div>
        </div>

        {{ pluginPowerup() }} 
        {{ Theme::partial('defaultjs') }} 
        {{ Theme::partial('analytic') }} 
    </body>
</html>