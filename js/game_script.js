const show_debug = true;
const dev_grid_line = 1;
let logs_ct = '';
gsap.registerPlugin(gsap, MotionPathPlugin, EaselPlugin, PixiPlugin, TextPlugin, TweenMax, TimelineMax, Power2, Power0);
var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    x = w.innerWidth || e.clientWidth || g.clientWidth,
    y = w.innerHeight || e.clientHeight || g.clientHeight;

logs_ct += 'y = ' + y + '<br>';

logs_ct += 'x = ' + y * (16 / 9) + '<br>';
// let WIDTH = 1920;
// let HEIGHT = WIDTH * (9 / 16);
// let HEIGHT = WIDTH * (7.5 / 16);
let HEIGHT = y * 0.96;
let WIDTH = HEIGHT * (16 / 9);
$('#gameContainer').css({'height': HEIGHT});
show_console('origin HEIGHT =' + HEIGHT);
// WIDTH = window.innerWidth;
// HEIGHT = window.innerWidth  * (9/ 16);
logs_ct += 'WIDTH = ' + WIDTH + '<br>';
logs_ct += 'HEIGHT = ' + HEIGHT + '<br>';
let origin_ratio =WIDTH/1600;
logs_ct += 'origin_ratio = ' + origin_ratio + '<br>';

let isometryPlane_distance_val = WIDTH / 2;
let extend_height = 150;
let germs_speed = 0.8;
let germs_speed_base = 1;
let germs_generate_speed = 50;
let countdown = 60;
let damage_ratio = 0.112;
let health_width = 300;
let health_width_in = 300;
let level = 2;
let numberOfgerms_pop = 10;
let germs_height = 80;
let germs_width = 80;
let germs_origin_height = 1;
let germs_origin_fade_in = 0.1;
let germs_origin_fade_out = 5.5;
let block_wall_ratio = 0.85;
let gameScene, bg_sprite, state, health, bg_container, germs_pop, all_obj_container, germs_no, germs_alive, time_sprite,
    blood_sprite, time_container, blood_container;  //基礎設定
let pause_btn, play_btn;
const germs_fade_out_set = 0.2;
show_console('WIDTH =' + WIDTH);
show_console('HEIGHT =' + HEIGHT);
let type = "WebGL";
if (!PIXI.utils.isWebGLSupported()) {
    type = "canvas"
}
show_console(type);
PIXI.settings.SCALE_MODE = PIXI.SCALE_MODES.NEAREST;
//遊戲基本設定
let opt = {
    backgroundColor: 0xffffff,
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
    loop1: 'sounds/loops/loop1.mp3',
    loop2: 'sounds/loops/loop2.mp3',
    loop3: 'sounds/loops/loop3.mp3',
    loop4: 'sounds/loops/loop4.mp3',
    bird: 'sounds/bird.mp3',
    boing: 'sounds/boing.mp3',
    buzzer: 'sounds/buzzer.mp3',
    car: 'sounds/car.mp3',
    chime: 'sounds/chime.mp3',
    success: 'sounds/success.mp3',
    sword: 'sounds/sword.mp3',
    whistle: 'sounds/whistle.mp3'
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


// Perform initial resizing
resize(app);
// browser window is resized.
window.addEventListener("resize", resize(app));

//遊戲元件
//血量
const blood_txt = new PIXI.Text(health_width, {
    fontFamily: '\'Noto Sans TC\', sans-serif',
    fontSize: 28,
    fill: 0xffff00,
    align: 'center'
});
blood_txt.anchor.set(0.5);
app.stage.addChild(blood_txt);
blood_txt.position.set(400, 50);
//倒數計時<
const timer_txt = new PIXI.Text(countdown, {
    fontFamily: '\'Noto Sans TC\', sans-serif',
    fontSize: 28,
    fill: 0xffffff,
    align: 'center'
});
timer_txt.anchor.set(0.5);
app.stage.addChild(timer_txt);
timer_txt.position.set(400, 30);
const timer = new EE3Timer.Timer(1000);
timer.repeat = countdown;
timer.on('start', elapsed => {
    show_console('start');
});
timer.on('end', elapsed => {
    show_console('end', elapsed);
    timer_txt.text = '時間到';
    player_action = false;
    for (let i = 0; i < germs_pop.length; i++) {
        if (germs_pop[i].alpha > 0) {
            germs_pop[i].alpha = .5
            all_obj_container.destroy();
        }
    }
});
timer.on('repeat', (elapsed, repeat) => {
    // show_console('repeat', repeat);
    countdown--;
    timer_txt.text = countdown;
});
timer.on('stop', elapsed => {
    show_console('stop');
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
const isometryPlane_distance = [0, -(isometryPlane_distance_val) * 1.025, -(isometryPlane_distance_val) * 1.01, -(isometryPlane_distance_val) * 0.988, -(isometryPlane_distance_val) * 0.97];
const isometryPlane_distance_to = [0, -(isometryPlane_distance_val) * 1.78, -(isometryPlane_distance_val) * 1.273, -(isometryPlane_distance_val) * 0.74, -(isometryPlane_distance_val) * 0.16];
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
healthBar.position.set(20, 20)
app.stage.addChild(healthBar);
let innerBar = new PIXI.Graphics();
innerBar.beginFill(0x000000);
innerBar.drawRect(0, 0, health_width, 20);
innerBar.endFill();
healthBar.addChild(innerBar);
let outerBar = new PIXI.Graphics();
outerBar.beginFill(0xFF3300);
outerBar.drawRect(0, 0, health_width_in, 20);
outerBar.endFill();
healthBar.addChild(outerBar);
healthBar.outer = outerBar;
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
const block_wall = new PIXI.Graphics();
block_wall.beginFill(0xFFFFFF, 0);
block_wall.drawRect(0, 0, WIDTH, HEIGHT * block_wall_ratio);
block_wall.endFill();
app.stage.addChild(block_wall);
block_wall.zIndex = 50;
// 載入圖片
loader
    .add('germs_1', "images/b_1.png")
    .add('germs_2', "images/b_2.png")
    .add('germs_3', "images/b_3.png")
    .add('germs_4', "images/b_4.png")
    .add('time_sprite', "images/game_main_time.png")
    .add('blood_sprite', "images/game_main_life0.png")
    .add('bg_sprite', "images/bg3_1600_900.png")
    .load(setup);

//爆破
//加入場景
function setup() {
    germs_no = 0;
    germs_alive = []; //細菌活著
    germs_pop = ['5ways', [], [], [], []];
    gameScene = new Container;
    bg_container = new Container;
    blood_container = new Container;
    time_container = new Container;
    all_obj_container = new Container;
    show_console('health = 300');

    // var size = new PIXI.Rectangle(16, 32, 16, 16);
    // let bg_texture = new PIXI.Texture(loader.resources["bg_sprite"].texture,size);
    bg_sprite = new Sprite(loader.resources["bg_sprite"].texture);
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

    blood_sprite.width =  blood_sprite.width *  origin_ratio;
    blood_sprite.height =  blood_sprite.height *  origin_ratio;
    blood_sprite.x = 0;
    blood_sprite.y = 0;
    blood_container.addChild(blood_sprite);

    time_sprite.width =  time_sprite.width *  origin_ratio;
    time_sprite.height =  time_sprite.height *  origin_ratio;
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
    blood_container.y =(HEIGHT - blood_container.height) / 8;
    time_container.x = (WIDTH - time_container.width) / 1.15;
    time_container.y = (HEIGHT - time_container.height) / 8;
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

    // const sound = PIXI.sound.play("loop1",{autoplay: true,loop: true});
    // sound.volume = 1;
    // const sound = PIXI.sound.add('loop1',{loop:true});

    //執行遊戲
    state = play;
    let ticker = app.ticker.add(delta => gameLoop(delta));
    ticker.autoStart = false;
    ticker.start();
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


//判斷螢幕裝置方向
//判斷手機方向：
    if (window.orientation === 180 || window.orientation === 0) {
        ticker.stop();
        alert('目前您的螢幕為縱向！');
    }
    if (window.orientation === 90 || window.orientation === -90) {
        // alert('目前您的螢幕為橫向！');
    }
    window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {
        if (window.orientation === 180 || window.orientation === 0) {
            ticker.stop();
            alert('目前您的螢幕為縱向！');
        }
        if (window.orientation === 90 || window.orientation === -90) {
            ticker.start();
            alert('目前您的螢幕為橫向！');
        }
    }, false);
}

let is_run = true;
let damage_sum = 0;
let damage = health_width * damage_ratio;


function gameLoop(delta) {
    //更新遊戲場景:
    state(delta);
}

let run_create_germs = 0;

function play(delta) {
    run_create_germs += delta;
    // console.log(delta);
    if (player_action) {
        if ((run_create_germs % germs_generate_speed) < 1) {
            creatGerms();
        }
    }
    bg_container.interactive = true;
    bg_container.on('pointerdown', function () {
        // console.log('health_width_in' + health_width_in);
        // console.log('health_width_in' + damage);
        // health_width_in = health_width_in - damage;
        if (health_width_in > damage && countdown > 0) {
            healthBar.outer.width = health_width_in;
            return false;
        } else {
            healthBar.outer.width = 0;
        }
    });

    removeGerms();

    add_key_action();

    timer.timerManager.update(app.ticker.elapsedMS); //倒數計時

    //>細菌

}

function add_key_action() {
    for (let k = 1; k < germs_pop.length; k++) {
        keys[k].press = function () {
            for (let i = 0; i < germs_pop[k].length; i++) {
                gsap.to(germs_pop[k][i].children[1], 0.5, {
                    pixi: {alpha: 0}
                });
                let aBox = germs_pop[k][i].getBounds();
                let bBox = block_wall.getBounds();

                let res = aBox.y + aBox.height > bBox.height;
                console.log('res1 - ' + res);
                if (res) {
                    PIXI.sound.play("boing", {speed: 5});
                    germs_pop[k][i].children[1].alpha = 1;
                    gsap.to(germs_pop[k][i].children[1], 2, {
                        pixi: {alpha: 0}
                    });
                    germs_pop[k][i].alpha = 0.8;
                    germs_pop[k][i].interactive = false;
                    germs_alive[germs_no] = 0;
                    console.log(germs_alive[germs_no]);
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
    gsap.to(this.children[1], 0.5, {
        pixi: {alpha: 0}
    });
    let aBox = this.getBounds();
    let bBox = block_wall.getBounds();

    let res = aBox.y + aBox.height > bBox.height;
    console.log('res1 - ' + res);
    if (res) {
        PIXI.sound.play("boing", {speed: 5});
        this.children[1].alpha = 1;
        gsap.to(this.children[1], 2, {
            pixi: {alpha: 0}
        });
        this.alpha = 0.8;
        this.interactive = false;
        germs_alive[germs_no] = 0;
        console.log(germs_alive[germs_no]);
    }
}

let _germs_container, _germs;
let animatedSprite;
let alienImages = ["images/explode_1.png", "images/explode_2.png", "images/explode_3.png"];
let textureArray = [];
for (let i = 0; i < alienImages.length; i++) {
    let texture = PIXI.Texture.from(alienImages[i]);
    textureArray.push(texture);
}

function creatGerms() {
    //set 敵人
    // show_console('creatGerms' + germs_pop.length);
    // console.log('germs_pop.length' + germs_pop.length);
    let all_pop = germs_pop[1].length + germs_pop[2].length + germs_pop[3].length + germs_pop[4].length;
    let get_rand = get5WayArr(level)[getRandomInt(0, 4)];
    let r_i = get_rand[getRandomInt(0, 3)];
    //效果

    animatedSprite = new PIXI.AnimatedSprite(textureArray);
    animatedSprite.anchor.x = 0.46;
    animatedSprite.anchor.y = 0.8;
    animatedSprite.width = animatedSprite.width * (WIDTH / bg_sprite.width) / 2.5;
    animatedSprite.height = animatedSprite.height * (HEIGHT / bg_sprite.height) / 2.5;
    animatedSprite.alpha = 0;
    animatedSprite.play();
    animatedSprite.interactive = false;
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
        ease: "power2.in",
        onComplete: function () {
        },
        onUpdate: function () {
        }
    });
    // });

    _germs_container[r_i].addChild(animatedSprite);
    _germs_container[r_i].alpha = 1;
    _germs_container[r_i].interactive = true;
    _germs_container[r_i].on('pointerdown', onClick);
    all_obj_container.addChild(_germs_container[r_i]);
    germs_pop[r_i].push(_germs_container[r_i]);


}

function removeGerms() {
    // show_console('removeGerms');
    // show_console('HEIGHT - ' + (HEIGHT + germs_origin_height));
    // console.log(all_obj_container.children.length );
    for (let i = 0; i < germs_pop.length; i++) {
        for (let j = 0; j < germs_pop[i].length; j++) {
            if (germs_pop[i][j].y > (HEIGHT)) {
                if (germs_alive[germs_no]) {
                    if (germs_alive[germs_no - 1] != 0) {

                        health_width_in = health_width_in - damage;
                    }
                    console.log('germs_alive[germs_no] ' + germs_alive[germs_no - 1]);
                    if (health_width_in > damage && countdown > 0) {
                        healthBar.outer.width = health_width_in;
                    } else {
                        healthBar.outer.width = 0;
                    }
                    // show_console(health_width_in);
                    blood_txt.text = Math.ceil(health_width_in);
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
