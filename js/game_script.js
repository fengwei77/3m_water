const show_debug = true;
const dev_grid_line = 1;
const bar1 = new ldBar(".ldBar");
let logs_ct = '';
let end_js = $.dialog({
    lazyOpen: true,
    icon: 'fa fa-tablet  faa-wrench animated',
    theme: 'supervan',
    closeIcon: false,
    animation: 'scale',
    type: 'orange',
    title: '遊戲結束',
    content: '請將手機轉回直立後顯示會結果畫面!'
});
gsap.registerPlugin(gsap, MotionPathPlugin, EaselPlugin, PixiPlugin, TextPlugin, TweenMax, TimelineMax, Power4, Power3, Power2, Power1, Power0);
var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    x = w.innerWidth || e.clientWidth || g.clientWidth,
    y = w.innerHeight || e.clientHeight || g.clientHeight;
var md = new MobileDetect(window.navigator.userAgent);
logs_ct += 'y = ' + y + '<br>';
logs_ct += 'x = ' + y * (16 / 9) + '<br>';
// let WIDTH = 1920;
// let HEIGHT = WIDTH * (9 / 16);
// let HEIGHT = WIDTH * (7.5 / 16);
let HEIGHT = y * 0.96;
let WIDTH = HEIGHT * (16 / 9);
$('#gameContainer').css({'height': HEIGHT});
// show_console('origin HEIGHT =' + HEIGHT);
// WIDTH = window.innerWidth;
// HEIGHT = window.innerWidth  * (9/ 16);
logs_ct += 'WIDTH = ' + WIDTH + '<br>';
logs_ct += 'HEIGHT = ' + HEIGHT + '<br>';
let origin_ratio = WIDTH / 1600;
logs_ct += 'origin_ratio = ' + origin_ratio + '<br>';



let isometryPlane_distance_val = WIDTH / 2;
let germs_speed = 0.8;
let germs_speed_base = 1;
let germs_generate_speed = 30;
let damage_speed = 60;
let countdown = 3;
let damage_ratio = 0.5;
let health_width = 220;
let health_width_in = 220;
if(_level == undefined){
    _level = $('#_level').val();
}
let level = _level;
let germs_height = 80;
let germs_width = 80;
let germs_origin_height = 1;
let germs_origin_fade_in = 0.1;
let germs_origin_fade_out = 4;
let block_wall_ratio = 0.88;
let block_wall_op = 0;
let unmute = true;
console.log('mobile' + md.mobile());
if (level == 1) {
    germs_speed = 1;
    germs_speed_base = 1;
    germs_generate_speed = 40;
    damage_ratio = 0.05;
} else if (level == 2) {
    germs_speed = 1;
    germs_speed_base = 1;
    germs_generate_speed = 40;
    damage_ratio = 0.1;
} else if (level == 3) {
    germs_speed = 1;
    germs_speed_base = 1;
    germs_generate_speed = 25;
    damage_ratio = 0.2;
} else {
    germs_speed = 1;
    germs_speed_base = 1;
    germs_generate_speed = 40;
}
if (WIDTH < 750 && md.mobile() != null) {
    block_wall_ratio = 0.66;
    germs_origin_fade_out = 1.7;
}
let gameScene, bg_sprite, state, health, bg_container, germs_pop, all_obj_container, germs_no, germs_alive, time_sprite,
    blood_sprite, time_container, blood_container, block_wall;  //基礎設定
let pause_btn, play_btn;
let app_w, app_x;
const germs_fade_out_set = 0.2;
// show_console('WIDTH =' + WIDTH);
// show_console('HEIGHT =' + HEIGHT);
let type = "WebGL";
if (!PIXI.utils.isWebGLSupported()) {
    type = "canvas"
}
// show_console(type);
PIXI.settings.SCALE_MODE = PIXI.SCALE_MODES.NEAREST;
//遊戲基本設定
let opt = {
    backgroundColor: 0x005D7E,
    width: WIDTH,
    height: HEIGHT,
    antialias: true,    // default: false
    transparent: false, // default: false
    autoResize: true,
    forceCanvas: true,
    resolution: window.devicePixelRatio || 1,
};
//player can click?
let player_action = true;
//遊戲場景
const manifest = {
    loop1: 'sounds/gs.mp3',
    boing: 'sounds/clear.mp3',
    buzzer: 'sounds/mechanical.mp3'
};

let app = new PIXI.Application(opt);
const loader = PIXI.Loader.shared;
const Sprite = PIXI.Sprite;
const Container = PIXI.Container;

app.stage.interactive = true;
app.stage.buttonMode = true;
app.stage.sortableChildren = true;
$('#gameContainer').append(app.view);

// Add to the PIXI loader
for (let name in manifest) {
    loader.add(name, manifest[name]);
}


window.addEventListener("resize", resize(app));
// setTimeout(function(){
const vpw = window.innerWidth;  // Width of the viewport
const vph = window.innerHeight; // Height of the viewport
let nvw; // New game width
let nvh; // New game height
if (vph / vpw < HEIGHT / WIDTH) {
    nvh = vph;
    nvw = (nvh * WIDTH) / HEIGHT;
} else {
    // In the else case, the opposite is happening.
    nvw = vpw;
    nvh = (nvw * HEIGHT) / WIDTH;
}
app.renderer.resize(nvw, nvh);

$('#gameContainer').css({'height': nvh});
// This command scales the stage to fit the new size of the game.
app.stage.scale.set(nvw / WIDTH, nvh / HEIGHT);

// },500);

//遊戲元件
//血量
const blood_txt = new PIXI.Text(Math.ceil(health_width_in / health_width * 100), {
    fontFamily: '\'Noto Sans TC\', sans-serif',
    fontSize: 55,
    fill: 0xED0000,
    align: 'center'
});
blood_txt.anchor.set(0.5);
app.stage.addChild(blood_txt);
blood_txt.position.set((WIDTH - blood_txt.width) / 6.40, (HEIGHT - blood_txt.height) / 4.7);

//倒數計時<
let timer_txt = new PIXI.Text(countdown, {
    fontFamily: '\'Noto Sans TC\', sans-serif',
    fontSize: 50,
    fill: 0xED0000,
    align: 'center'
});
timer_txt.anchor.set(0.5);
app.stage.addChild(timer_txt);
timer_txt.position.set((WIDTH - timer_txt.width) / 1.124, (HEIGHT - timer_txt.height) / 4.7);
if (WIDTH < 1280 && md.mobile() != null) {
    blood_txt.style.fontSize = 20;
    blood_txt.position.set((WIDTH - blood_txt.width) / 6.4, (HEIGHT - blood_txt.height) / 3.22);
    timer_txt.style.fontSize = 20;
    timer_txt.position.set((WIDTH - timer_txt.width) / 1.114, (HEIGHT - timer_txt.height) / 3.22);
}
if (WIDTH < 750 && md.mobile() != null) {
    blood_txt.style.fontSize = 20;
    blood_txt.position.set((WIDTH - blood_txt.width) / 6.4, (HEIGHT - blood_txt.height) / 3.22);
    timer_txt.style.fontSize = 20;
    timer_txt.position.set((WIDTH - timer_txt.width) / 1.124, (HEIGHT - timer_txt.height) / 3.22);
}

const timer = new EE3Timer.Timer(1000);
timer.repeat = countdown;
timer.on('start', elapsed => {
    // show_console('start');
});
timer.on('end', elapsed => {
    // show_console('end', elapsed);
    timer_txt.text = '0';
    player_action = false;


    for (let i = 0; i < germs_pop.length; i++) {
        if (germs_pop[i].alpha > 0) {
            germs_pop[i].alpha = .5
            all_obj_container.destroy();
        }
    }
    $('#end_text').html('恭喜過關!');
    $('#end_mask').fadeIn();

    setTimeout(function () {
        if (md.mobile() == null) {
            location.href = 'game_result_pass.php?lv=' + _level;
        } else {
            if (window.orientation === 90 || window.orientation === -90) {
                end_js.open();
                window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {
                    if (window.orientation === 0 || window.orientation === 180) {
                        // alert('目前您的螢幕為橫向！');
                        resize(app);
                        end_js.open();
                        location.href = 'game_result_pass.php?lv=' + _level;
                    }
                }, false);
            } else {
                location.href = 'game_result_pass.php?lv=' + _level;
            }
        }

    }, 2500);
});
timer.on('repeat', (elapsed, repeat) => {
    // show_console('repeat', repeat);
    countdown--;
    timer_txt.text = countdown;
});
timer.on('stop', elapsed => {
    // show_console('stop');
});
timer.start();
//>倒數計時
//細菌<
let germs = [];
// let germs_container = [];
let germs_container = ['container', new Container, new Container, new Container, new Container];
//>細菌

//軌道線<
const isometryPlane = [
    [new PIXI.Graphics(), new PIXI.Graphics()],
    new PIXI.Graphics(),
    new PIXI.Graphics(),
    new PIXI.Graphics(),
    new PIXI.Graphics(),
];
isometryPlane[0][0].lineStyle(0, 0xFF0000, dev_grid_line);
isometryPlane[0][0].moveTo(WIDTH / 2, 0);
isometryPlane[0][0].lineTo(WIDTH / 2, HEIGHT);
isometryPlane[0][1].lineStyle(0, 0x00FF00, dev_grid_line);
isometryPlane[0][1].moveTo(0, HEIGHT / 2.19);
isometryPlane[0][1].lineTo(WIDTH, HEIGHT / 2.19);
isometryPlane[0][0].zIndex = 80;
isometryPlane[0][1].zIndex = 80;
timer_txt.zIndex = 100;
app.stage.addChild(isometryPlane[0][0]);
app.stage.addChild(isometryPlane[0][1]);

let isometryPlane_distance = [0, -(isometryPlane_distance_val) * 1.023, -(isometryPlane_distance_val) * 1.006, -(isometryPlane_distance_val) * 0.982, -(isometryPlane_distance_val) * 0.959];
let isometryPlane_distance_to = [0, -(isometryPlane_distance_val) * 1.745, -(isometryPlane_distance_val) * 1.235, -(isometryPlane_distance_val) * 0.76, -(isometryPlane_distance_val) * 0.22];
if (WIDTH < 750 && md.mobile() != null) {
    // console.log(' md.mobile() ' + md.mobile());
    isometryPlane_distance = [0, -(isometryPlane_distance_val) * 1.025, -(isometryPlane_distance_val) * 0.999, -(isometryPlane_distance_val) * 0.976, -(isometryPlane_distance_val) * 0.954];
    isometryPlane_distance_to = [0, -(isometryPlane_distance_val) * 1.88, -(isometryPlane_distance_val) * 1.266, -(isometryPlane_distance_val) * 0.705, -(isometryPlane_distance_val) * (0.086)];
}
const point_arr = [];
for (let i = 1; i < isometryPlane.length; i++) {
    isometryPlane[i].lineStyle(0, 0xffffff, dev_grid_line);
    isometryPlane[i].moveTo(WIDTH + (isometryPlane_distance[i]), HEIGHT / 2.18);
    isometryPlane[i].lineTo(WIDTH + (isometryPlane_distance_to[i]), HEIGHT + germs_height);
    app.stage.addChild(isometryPlane[i]);
}
const iso_path_array = [[], [], [], [], []];
const action_gsap = [];
//>軌道線

//血量<
const healthBar = new PIXI.Container();
healthBar.position.set((WIDTH - healthBar.width) / 5.45, (HEIGHT - healthBar.height) / 5.45);
app.stage.addChild(healthBar);
let innerBar = new PIXI.Graphics();
innerBar.beginFill(0x000000);
innerBar.drawRect(0, 0, health_width, 0);
innerBar.endFill();
healthBar.addChild(innerBar);
let outerBar = new PIXI.Graphics();
outerBar.beginFill(0x002D64);
outerBar.drawRect(0, 0, health_width_in, 28);
outerBar.endFill();
healthBar.addChild(outerBar);
healthBar.outer = outerBar;
if (WIDTH < 750 && md.mobile() != null) {
    healthBar.width = 220 * origin_ratio;
    healthBar.height = 12;
    healthBar.position.set((WIDTH - healthBar.width) / 4.7, (HEIGHT - healthBar.height) / 3.5);
}

//>血量

//增加按鈕< Z X C V B
let keys = [
    'KEY_CODE',
    keyboard(49),
    keyboard(50),
    keyboard(51),
    keyboard(52),
];
//>增加按鈕

// 遮擋區塊 -z50
block_wall = new PIXI.Graphics();
block_wall.beginFill(0xFFFFFF, block_wall_op);
block_wall.drawRect(0, 0, WIDTH, HEIGHT * block_wall_ratio);
block_wall.endFill();
app.stage.addChild(block_wall);
block_wall.zIndex = 50;
// 載入圖片
loader
    .add('germs_1', "images/garm_1.png")
    .add('germs_2', "images/garm_2.png")
    .add('germs_3', "images/garm_3.png")
    .add('germs_4', "images/garm_4.png")
    .add('time_sprite', "images/game_main_time.png")
    .add('blood_sprite', "images/game_main_life0.png")
    .add('bg_sprite_s', "images/bg_1600_900_s.png")
    .add('bg_sprite_u', "images/bg_1600_900_u.png")
    .add('bg_sprite_x', "images/bg_1600_900_x.png")
    .on("progress", loadProgressHandler)
    .load(setup);

function loadProgressHandler(loader, resource) {

    bar1.set((loader.progress | 0));
    // console.log("progress: " + (loader.progress | 0) + "%");
    if (loader.progress >= 99) {
        $('#loadingPage').remove();
    }
}

//爆破
//加入場景
let sound = null;

function setup() {

    sound = PIXI.sound.play("loop1", {
        sound: 30,
        autoplay: true,
        loop: true
    });
    // sound.volume = 1;

    germs_no = 0;
    germs_alive = []; //細菌活著
    germs_pop = ['5ways', [], [], [], []];
    gameScene = new Container;
    bg_container = new Container;
    blood_container = new Container;
    time_container = new Container;
    all_obj_container = new Container;
    show_console('health = 300');

    app_w = app.stage.width;
    app_x = app.stage.x;
    bg_container.interactive = true;
    // var size = new PIXI.Rectangle(16, 32, 16, 16);
    // let bg_texture = new PIXI.Texture(loader.resources["bg_sprite"].texture,size);
    if (level == 2) {
        bg_sprite = new Sprite(loader.resources["bg_sprite_u"].texture);
    } else if (level == 3) {
        bg_sprite = new Sprite(loader.resources["bg_sprite_x"].texture);
    } else {
        bg_sprite = new Sprite(loader.resources["bg_sprite_s"].texture);
    }
    time_sprite = new Sprite(loader.resources["time_sprite"].texture);
    blood_sprite = new Sprite(loader.resources["blood_sprite"].texture);
    germs_origin_height = new Sprite(loader.resources["germs_1"].texture).height;
    show_console('germs_origin_height = ' + germs_origin_height);
    // action_gsap[i].pause();
    // action_gsap[i].play();

    gameScene.addChild(all_obj_container);
    //背景<
    // bg_sprite.width = bg_sprite.width  ;
    // bg_sprite.height = bg_sprite.height  ;
    bg_sprite.width = WIDTH + 10;
    bg_sprite.height = HEIGHT;

    bg_sprite.x = 0;
    bg_sprite.y = 0;
    bg_container.addChild(bg_sprite);

    blood_sprite.width = blood_sprite.width * origin_ratio;
    blood_sprite.height = blood_sprite.height * origin_ratio;
    blood_sprite.x = 0;
    blood_sprite.y = 0;
    blood_container.addChild(blood_sprite);

    time_sprite.width = time_sprite.width * origin_ratio;
    time_sprite.height = time_sprite.height * origin_ratio;
    time_sprite.x = 0;
    time_sprite.y = 0;
    time_container.addChild(time_sprite);

    app.stage.addChild(gameScene);
    app.stage.addChild(blood_container);
    app.stage.addChild(time_container);
    app.stage.addChild(bg_container);
    bg_container.zIndex = -1;
    // time_container.zIndex = -1;
    // blood_container.zIndex = -1;
    // show_console(bg_container.width);
    // show_console(app.stage.width);
    bg_container.x = (WIDTH - bg_container.width) / 2;
    bg_container.y = (HEIGHT - bg_container.height) / 2;
    blood_container.x = (WIDTH - blood_container.width) / 8;
    blood_container.y = (HEIGHT - blood_container.height) / 8;
    time_container.x = (WIDTH - time_container.width) / 1.15;
    time_container.y = (HEIGHT - time_container.height) / 8;

    if (WIDTH < 750 && md.mobile() != null) {
        blood_container.x = (WIDTH - blood_container.width) / 8;
        blood_container.y = (HEIGHT - blood_container.height) / 4.2;
        time_container.x = (WIDTH - time_container.width) / 1.15;
        time_container.y = (HEIGHT - time_container.height) / 4.2;

    }
    //>背景
    for (let i = 1; i < iso_path_array.length; i++) {
        point_arr[i] = isometryPlane[i].geometry.graphicsData;
        let this_points = point_arr[i][0].shape.points;
        for (let j = 0; j < this_points.length; j += 2) {
            // show_console(this_points[j]);
            iso_path_array[i].push({x: this_points[j], y: this_points[j + 1]});
            // show_console(iso_path_array[i]);
        }
    }

    // const sound = PIXI.sound.add('loop1',{loop:true});

    //執行遊戲
    state = play;
    let ticker = app.ticker.add(delta => gameLoop(delta));
    ticker.autoStart = false;
    ticker.stop();
    // ticker.start();
    keyboard(27).press = function () {
        ticker.stop();
        // sound.volume = 0;
    };
    keyboard(116).press = function () {
        location.reload();
        ticker.stop();
        // sound.volume = 0;
    };
//  ticker.start();
    keyboard(80).press = function () {
        sound.volume = 1;
        ticker.start();
    };
    gameScene.visible = true;

    PIXI.sound.togglePauseAll();
    $('.go_game').click(function () {

        // screenfull.request();
        if (screenfull.isEnabled && isMobile) {
            screenfull.request();
        }
        $("#black_mask").fadeOut(500, function () {
            // Animation complete.
            $('#game_memo').remove();
            ticker.start();
            PIXI.sound.togglePauseAll();
        });

    });
//判斷螢幕裝置方向
//判斷手機方向：

    let jc = $.dialog({
        lazyOpen: true,
        icon: 'fa fa-tablet  faa-wrench animated',
        theme: 'supervan',
        closeIcon: false,
        animation: 'scale',
        type: 'orange',
        title: '注意!',
        content: '請把手機轉至橫向才可開始遊戲!',
        onContentReady: function () {
            // this === jc
            window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {
                if (window.orientation === 90 || window.orientation === -90) {
                    resize(app);
                    $('#black_mask').hide();
                    jc.close();
                    ticker.start();
                    // alert('目前您的螢幕為橫向！');
                }
            }, false);
        }
    });
    // if (window.orientation === 180 || window.orientation === 0) {
    //
    //     // sound.volume = 0;
    //     ticker.stop();
    //     $('#black_mask').show();
    //     // jc.open();
    // }
    // if (window.orientation === 90 || window.orientation === -90) {
    //     $('#black_mask').hide();
    //     ticker.start();
    //     // alert('目前您的螢幕為橫向！');
    // }
    window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {
        if (window.orientation === 180 || window.orientation === 0) {
            // sound.volume = 0;
            resize(app);
            ticker.stop();
            $('#black_mask').show();
            jc.open();
        }
        if (window.orientation === 90 || window.orientation === -90) {
            resize(app);
            $('#black_mask').hide();
            ticker.start();

            // sound.volume = 60;
            // alert('目前您的螢幕為橫向！');
        }
    }, false);

    //靜音
    $('#sound').click(function () {
        sound.volume = 0;
        $('#sound').hide();
        $('#mute').show();
        unmute = false;
    });
    $('#mute').click(function () {
        sound.volume = 30;
        $('#mute').hide();
        $('#sound').show();
        unmute = true;
    });
}

let is_run = true;
let damage_sum = 0;
let damage = health_width * damage_ratio;


function gameLoop(delta) {
    //更新遊戲場景:
    state(delta);
}

let run_create_germs = 0;
let is_shake = false;
let is_shake_color = '0xFFFFFF';
let shake = true;

const dmg_timer = new EE3Timer.Timer(500);
dmg_timer.on('start', function () {
    //// console.log('dmg_timer -start');
});
dmg_timer.on('end', elapsed => {
    if (elapsed === 500) {
        block_wall.clear();
        block_wall.beginFill(0xFFFFFF, block_wall_op);
        block_wall.drawRect(0, 0, WIDTH, HEIGHT * block_wall_ratio);
        block_wall.endFill();
        is_shake = false;
        //// console.log('dmg_timer -end');
    }
    dmg_timer.reset(); //Reset the timer
}, dmg_timer);

function play(delta) {

    run_create_germs += delta;
    //// console.log(delta);
    if (player_action) {
        if ((run_create_germs % germs_generate_speed) < 1) {
            creatGerms();
        }
    }
    removeGerms();
    if ((run_create_germs % damage_speed) < 1 && !is_shake) {
        block_wall.clear();
        block_wall.beginFill(0xFFFFFF, block_wall_op);
        block_wall.drawRect(0, 0, WIDTH, HEIGHT * block_wall_ratio);
        block_wall.endFill();
        shake = false;
        bg_container.interactive = true;
    }
    if (!is_shake) {
        bg_container.x = 0;
    }
    if ((run_create_germs % 2) < 1 && is_shake) {
        if(unmute) {
            PIXI.sound.play("buzzer", {volume:50,speed: 5});
        }
        if (shake) {
            bg_container.x = bg_container.x - 10;
            shake = false;
        } else {
            bg_container.x = bg_container.x + 10;
            shake = true;
        }
        block_wall.clear();
        block_wall.beginFill(is_shake_color, 0);
        block_wall.drawRect(0, 0, WIDTH, HEIGHT * 2);
        // if(is_shake_color =='0xFF0000'){
        //     is_shake_color ='0xFFFFFF'
        // }else{
        //     is_shake_color ='0xFF0000'
        // }

        dmg_timer.start();

        // if((run_create_germs % 120) < 1 && is_shake) {
        // block_wall.clear();
        // block_wall.beginFill(0xFFFFFF, 0);
        // block_wall.drawRect(0, 0, WIDTH, HEIGHT * 1);

        // }
        block_wall.endFill();
    }
    //// console.log(' bg_container.interactive- ' +  bg_container.interactive);
    bg_container.on('pointerdown', function () {
        //// console.log('health_width_in' + health_width_in);
        //// console.log('health_width_in' + damage);
        // health_width_in = health_width_in - damage;
        is_shake = true;
        bg_container.interactive = false;
        // if (health_width_in > damage && countdown > 0) {
        //     healthBar.outer.width = health_width_in;
        //     return false;
        // } else {
        //     healthBar.outer.width = 0;
        // }
    });

    add_key_action();

    timer.timerManager.update(app.ticker.elapsedMS); //倒數計時

    //>細菌

}

function add_key_action() {
    for (let k = 1; k < germs_pop.length; k++) {
        keys[k].press = function () {

            is_shake = true;
            bg_container.interactive = false;
            for (let i = 0; i < germs_pop[k].length; i++) {
                // gsap.to(germs_pop[k][i].children[1], 0.5, {
                //     pixi: {alpha: 0}
                // });

                let aBox = germs_pop[k][i].getBounds();
                let bBox = block_wall.getBounds();

                let res = aBox.y + aBox.height > bBox.height;
                //// console.log('res1 - ' + res);
                if (res) {
                    animatedSprite = new PIXI.AnimatedSprite(textureArray);
                    animatedSprite.anchor.x = 0.46;
                    animatedSprite.anchor.y = 0.8;
                    animatedSprite.width = animatedSprite.width * (WIDTH / bg_sprite.width) / 2.5;
                    animatedSprite.height = animatedSprite.height * (HEIGHT / bg_sprite.height) / 2.5;
                    animatedSprite.alpha = 1;
                    animatedSprite.play();
                    animatedSprite.interactive = false;
                    germs_pop[k][i].addChild(animatedSprite);
                    if(unmute) {
                        PIXI.sound.play("boing", {volume:50,speed: 1});
                    }
                    // germs_pop[k][i].children[1].alpha = 1;
                    gsap.to(germs_pop[k][i].children[1], 2, {
                        pixi: {alpha: 0}
                    });

                    germs_pop[k][i].alpha = 0.8;
                    germs_pop[k][i].interactive = false;
                    germs_alive[germs_no] = 0;
                    // console.log(germs_alive[germs_no]);
                    is_shake = false;
                    bg_container.interactive = true;
                }

            }
        };
    }
}

//動作
function addInteraction(obj) {
    obj.on('pointerdown', onClick);
}

//CLICK方法
function onClick() {
    // gsap.to(this.children[1], 0.5, {
    //     pixi: {alpha: 0}
    // });

    let aBox = this.getBounds();
    let bBox = block_wall.getBounds();

    let res = aBox.y + aBox.height > bBox.height;
    // console.log('res1 - ' + res);
    if (res) {
        animatedSprite = new PIXI.AnimatedSprite(textureArray);
        animatedSprite.anchor.x = 0.46;
        animatedSprite.anchor.y = 0.8;
        animatedSprite.width = animatedSprite.width * (WIDTH / bg_sprite.width) / 2.5;
        animatedSprite.height = animatedSprite.height * (HEIGHT / bg_sprite.height) / 2.5;
        animatedSprite.alpha = 0;
        animatedSprite.play();
        animatedSprite.interactive = false;
        this.addChild(animatedSprite);
        if(unmute) {
            PIXI.sound.play("boing", {volume:50,speed: 1});
        }
        this.children[1].alpha = 1;
        gsap.to(this.children[1], 2, {
            pixi: {alpha: 0}
        });
        this.alpha = 0.8;
        this.interactive = false;
        germs_alive[germs_no] = 0;
        //// console.log(germs_alive[germs_no]);

    }
}

let _germs_container, _germs;
let animatedSprite;
let alienImages = ["images/explode_1.png", "images/explode_2.png", "images/explode_3.png", "images/explode_4.png"];
let textureArray = [];
for (let i = 0; i < alienImages.length; i++) {
    let texture = PIXI.Texture.from(alienImages[i]);
    textureArray.push(texture);
}
// animatedSprite = new PIXI.AnimatedSprite(textureArray);
// animatedSprite.anchor.x = 0.46;
// animatedSprite.anchor.y = 0.8;
// animatedSprite.width = animatedSprite.width * (WIDTH / bg_sprite.width) / 2.5;
// animatedSprite.height = animatedSprite.height * (HEIGHT / bg_sprite.height) / 2.5;
// animatedSprite.alpha = 0;
// animatedSprite.play();
// animatedSprite.interactive = false;
function creatGerms() {
    //set 敵人
    // show_console('creatGerms' + germs_pop.length);
    //// console.log('germs_pop.length' + germs_pop.length);
    let all_pop = germs_pop[1].length + germs_pop[2].length + germs_pop[3].length + germs_pop[4].length;
    let get_rand = get5WayArr(level)[getRandomInt(0, 4)];
    let r_i = get_rand[getRandomInt(0, 3)];
    //效果
//細菌<
    germs_no++;
    germs_alive[germs_no] = true;
    _germs_container = [];
    _germs = [
        'sprite'
        , new Sprite(loader.resources["germs_1"].texture)
        , new Sprite(loader.resources["germs_2"].texture)
        , new Sprite(loader.resources["germs_3"].texture)
        , new Sprite(loader.resources["germs_4"].texture)
    ];
    _germs_container[r_i] = new Container;
    _germs[r_i].anchor.x = 0.5;
    _germs[r_i].anchor.y = 0.5;
    _germs[r_i].width = _germs[r_i].width * (WIDTH / bg_sprite.width) / 2;
    _germs[r_i].height = _germs[r_i].height * (HEIGHT / bg_sprite.height) / 2.2;
    // show_console('_germs[' + i + '].width-' + _germs[r_i].width);
    _germs[r_i].x = 0;
    _germs[r_i].y = 0;
    _germs[r_i].height = germs_height;
    _germs[r_i].width = germs_width;
    _germs_container[r_i].addChild(_germs[r_i]);
    _germs_container[r_i].zIndex = germs_no % 20 + 10;
    //細菌加入動作
    _germs_container[r_i].position.copyFrom(iso_path_array[r_i][0]);
    _germs_container[r_i].pivot.set(0.5);
    _germs_container[r_i].scale.set(germs_origin_fade_in);


    action_gsap[r_i] = gsap.to(_germs_container[r_i], {
        pixi: {scale: germs_origin_fade_out},
        duration: germs_speed + germs_speed_base,
        repeat: 1,
        motionPath: {
            path: iso_path_array[r_i]
        },
        ease: "power3.in",
        onComplete: function () {
        },
        onUpdate: function () {
        }
    });
    // });

    // _germs_container[r_i].addChild(animatedSprite);
    _germs_container[r_i].alpha = 1;
    _germs_container[r_i].interactive = true;
    _germs_container[r_i].on('pointerdown', onClick);
    all_obj_container.addChild(_germs_container[r_i]);
    germs_pop[r_i].push(_germs_container[r_i]);


}

function removeGerms() {
    // show_console('removeGerms');
    // show_console('HEIGHT - ' + (HEIGHT + germs_origin_height));
    //// console.log(all_obj_container.children.length );
    for (let i = 0; i < germs_pop.length; i++) {
        for (let j = 0; j < germs_pop[i].length; j++) {
            // console.log(germs_pop[i][j].y +'-'+ (bg_container.height-germs_height));
            if (germs_pop[i][j].y > (HEIGHT)) {
                if (germs_alive[germs_no]) {
                    if (germs_alive[germs_no] != 0) {

                        health_width_in = health_width_in - damage;
                    }
                    // console.log('germs_alive[germs_no] ' + germs_alive[germs_no - 1]);
                    if (health_width_in > damage - 1 && countdown > 0) {
                        healthBar.outer.width = health_width_in;
                    } else {
                        healthBar.outer.width = 0;
                    }
                    if (health_width_in >= 0) {
                        // show_console(health_width_in);
                        blood_txt.text = Math.ceil(health_width_in / health_width * 100);
                    } else {
                        sound.volume = 0;
                        timer.stop();

                        $('#end_mask').fadeIn();

                        setTimeout(function () {
                            if (md.mobile() == null) {
                                location.href = 'game_result_fail.php?lv=' + _level;
                            } else {
                                if (window.orientation === 90 || window.orientation === -90) {
                                    end_js.open();
                                    window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {
                                        if (window.orientation === 0 || window.orientation === 180) {
                                            // alert('目前您的螢幕為橫向！');
                                            resize(app);
                                            end_js.open();
                                            location.href = 'game_result_fail.php?lv=' + _level;
                                        }
                                    }, false);
                                } else {
                                    location.href = 'game_result_fail.php?lv=' + _level;
                                }
                            }

                        }, 1500);

                        return false;
                    }

                }
                //刪除陣列
                germs_pop[i].splice(j, 1);
                //刪除物件
                if (all_obj_container.children.length > 0) {
                    all_obj_container.removeChildAt(j);
                }
            }
        }
    }
    if (healthBar.outer.width <= 0) {
        gameScene.visible = false;
    }
}

//按鍵方法
function keyboard(keyCode) {
    var key = {};
    key.code = keyCode;
    key.isDown = false;
    key.isUp = true;
    key.press = undefined;
    key.release = undefined;

    key.downHandler = function (event) {
        if (event.keyCode === key.code && player_action) {
            if (key.isUp && key.press) key.press();
            key.isDown = true;
            key.isUp = false;
        }
        event.preventDefault();
    };

    key.upHandler = function (event) {
        if (event.keyCode === key.code) {
            if (key.isDown && key.release) key.release();
            key.isDown = false;
            key.isUp = true;
        }
        event.preventDefault();
    };

    window.addEventListener(
        "keydown", key.downHandler.bind(key), false
    );
    window.addEventListener(
        "keyup", key.upHandler.bind(key), false
    );
    return key;
}

//FACEBOOK分享和授權判斷
//debug

show_console('jquery - ' + $().jquery);

function show_console(msg = '') {
    if (show_debug) {
        console.log(msg);
    }
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}


function wait(duration = 0) {
    return new Promise((resolve, reject) => {
        setTimeout(resolve, duration);
    });
}

function get5WayArr(lv) {
    let arr = [];
    if (lv == 1) {
        arr = [
            [2, 3, 2, 3],
            [2, 2, 3, 2],
            [2, 3, 2, 3],
            [3, 2, 2, 3],
            [2, 3, 2, 3],
        ];
    }
    if (lv == 2 || lv == 3) {
        arr = [
            [2, 1, 4, 3],
            [1, 2, 3, 4],
            [4, 1, 3, 2],
            [2, 3, 4, 1],
            [3, 4, 1, 2]
        ];
    }
    if (lv == 4) {
        arr = [
            [1, 1, 1, 1],
            [1, 1, 1, 1],
            [1, 1, 1, 1],
            [1, 1, 1, 1],
            [1, 1, 1, 1]
        ];
    }
    if (lv == 5) {
        arr = [
            [2, 2, 2, 2],
            [2, 2, 2, 2],
            [2, 2, 2, 2],
            [2, 2, 2, 2],
            [2, 2, 2, 2]
        ];
    }
    if (lv == 6) {
        arr = [
            [3, 3, 3, 3],
            [3, 3, 3, 3],
            [3, 3, 3, 3],
            [3, 3, 3, 3],
            [3, 3, 3, 3]
        ];
    }
    if (lv == 7) {
        arr = [
            [4, 4, 4, 4],
            [4, 4, 4, 4],
            [4, 4, 4, 4],
            [4, 4, 4, 4],
            [4, 4, 4, 4]
        ];
    }

    return arr;
}


//縮放
function resize(app) {
    return function () {
        const vpw = window.innerWidth;  // Width of the viewport
        const vph = window.innerHeight; // Height of the viewport
        let nvw; // New game width
        let nvh; // New game height

        // The aspect ratio is the ratio of the screen's sizes in different dimensions.
        // The height-to-width aspect ratio of the game is HEIGHT / WIDTH.

        if (vph / vpw < HEIGHT / WIDTH) {
            // If height-to-width ratio of the viewport is less than the height-to-width ratio
            // of the game, then the height will be equal to the height of the viewport, and
            // the width will be scaled.
            nvh = vph;
            nvw = (nvh * WIDTH) / HEIGHT;
        } else {
            // In the else case, the opposite is happening.
            nvw = vpw;
            nvh = (nvw * HEIGHT) / WIDTH;
        }

        // Set the game screen size to the new values.
        // This command only makes the screen bigger --- it does not scale the contents of the game.
        // There will be a lot of extra room --- or missing room --- if we don't scale the stage.
        app.renderer.resize(nvw, nvh);


        $('#gameContainer').css({'height': nvh});
        // This command scales the stage to fit the new size of the game.
        app.stage.scale.set(nvw / WIDTH, nvh / HEIGHT);


    };
}


$('#logs').html(logs_ct);

function visibleWindowHeight(callback) {
    /* create temporary element 'tmp' */
    var vpHeight,
        tmp = document.createElement('div');

    tmp.id = "vp_height_px";

    /* tmp height = viewport height (100vh) */
    tmp.setAttribute("style", "position:absolute;" +
        "top:0;" +
        "left:-1px;" +
        "width:1px;" +
        "height:100vh;");

    /* add tmp to page */
    document.body.appendChild(tmp);

    /* get tmp height in px */
    vpHeight = document.getElementById("vp_height_px").clientHeight;

    /* clean up */
    document.body.removeChild(tmp);

    /* pass value to callback and continue */
    callback(vpHeight);
}