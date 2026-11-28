<style>
    /* ===== أساسيات (موجودة في موقعك غالباً - احذفها لو مكررة) ===== */
:root{--bg:#06182a;--bg2:#0a2236;--card:#0c2a40;--line:#17405c;--mut:#9fb6c8;--cy:#14d6e6;--or:#ff8a1f;color-scheme:dark}
*,*::before,*::after{box-sizing:border-box}
body{margin:0;background:var(--bg);color:#fff;font-family:Cairo,system-ui,sans-serif;line-height:1.7}
.wrap{width:min(1200px,92%);margin-inline:auto}
.btn{display:inline-flex;align-items:center;gap:8px;padding:11px 26px;border-radius:12px;font:inherit;font-weight:700;border:1.5px solid var(--or);cursor:pointer;text-decoration:none;transition:.3s}
.btn.pri{background:var(--or);color:#1a1000}.btn.pri:hover{box-shadow:0 0 24px #ff8a1f88;transform:translateY(-3px)}
.tag{color:var(--or);font-weight:600;display:flex;align-items:center;gap:10px;margin:0}.tag::before{content:"";width:30px;height:2px;background:var(--or)}
.ttl{font-size:clamp(22px,3vw,32px);margin:0 0 26px;font-weight:700}
.rv{opacity:0;transform:translateY(36px);transition:opacity .8s,transform .8s}.rv.in{opacity:1;transform:none}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}.rv{opacity:1;transform:none}}

/* ===== قسم العملاء (سلايدر) ===== */
.cx{position:relative;padding:70px 0 60px;overflow:hidden}
.cx::before{content:"";position:absolute;inset:0;pointer-events:none;background:radial-gradient(45% 60% at 85% 20%,#14d6e61f,transparent),radial-gradient(40% 60% at 10% 90%,#ff8a1f1c,transparent)}
.cx .wrap{position:relative}
.cx-sub{color:var(--mut);margin:-14px 0 30px}
.csl{position:relative;padding-inline:58px}
.ctr{display:flex;gap:18px;overflow-x:auto;overflow-y:hidden;scroll-snap-type:x mandatory;scroll-padding-inline:4px;scroll-behavior:smooth;scrollbar-width:none;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;padding:14px 4px 18px;cursor:grab;outline:0}
.ctr::-webkit-scrollbar{display:none}
.ctr:focus-visible{box-shadow:0 0 0 2px var(--cy);border-radius:16px}
.ctr.dg{scroll-snap-type:none;scroll-behavior:auto;cursor:grabbing;user-select:none}
.cc{flex:0 0 calc((100% - 54px)/4);scroll-snap-align:start;text-align:center;padding:26px 14px;border-radius:20px;background:linear-gradient(145deg,#0e3350d9,#071d31d9);border:1px solid #1b4a6a;box-shadow:0 12px 30px #0006,inset 0 1px 0 #ffffff12;transition:transform .4s,border-color .4s,box-shadow .4s;user-select:none}
.cc:hover{transform:translateY(-6px);border-color:var(--cy);box-shadow:0 18px 40px #14d6e62e}
.ci{width:58px;height:58px;margin:0 auto 12px;border-radius:18px;display:grid;place-items:center;color:#fff;background:linear-gradient(145deg,#14d6e6,#0b6f8e);box-shadow:0 8px 22px #14d6e655;transition:.5s}
.cc.o .ci{background:linear-gradient(145deg,#ffa043,#ff5e0a);box-shadow:0 8px 22px #ff8a1f55}
.cc:hover .ci{transform:rotate(-8deg) scale(1.1)}
.ci svg{width:30px;height:30px}
.cc b{display:block;font-size:18px;direction:ltr;line-height:1.4}.cc small{color:var(--mut);font-size:13px}
.sb{position:absolute;top:calc(50% - 2px);translate:0 -50%;z-index:2;width:44px;height:44px;border-radius:50%;border:1px solid var(--line);background:var(--bg2);color:#fff;font-size:24px;line-height:1;cursor:pointer;transition:.3s;padding:0}
.sb.pv{right:0}.sb.nx{left:0}
.sb:hover:not(:disabled){background:var(--or);border-color:var(--or);color:#1a1000}
.sb:disabled{opacity:.35;cursor:default}
.cdt{display:flex;gap:8px;justify-content:center;margin-top:6px}
.cdt button{width:10px;height:10px;border-radius:50%;border:0;background:#2b5470;cursor:pointer;padding:0;transition:.3s}.cdt button.on{background:var(--or);width:28px;border-radius:6px}
.cx-foot{display:flex;align-items:center;justify-content:center;gap:18px;flex-wrap:wrap;width:fit-content;max-width:100%;margin:34px auto 0;padding:10px 12px 10px 14px;border-radius:60px;background:#0a2236cc;border:1px solid var(--line);box-shadow:0 0 40px #14d6e61a}
.cx-foot span{padding-inline:14px;color:#cfdde8}.cx-foot b{color:var(--or);font-size:22px}
@media(max-width:1100px){.cc{flex-basis:calc((100% - 36px)/3)}}
@media(max-width:800px){.cc{flex-basis:calc((100% - 18px)/2)}}
@media(max-width:560px){.csl{padding-inline:0}.cc{flex-basis:76%}.sb{width:38px;height:38px;font-size:20px;background:#06182acc}.sb.pv{right:-6px}.sb.nx{left:-6px}.cx-foot{border-radius:22px}}
.ctr.mv{scroll-snap-type:none;scroll-behavior:auto}
@media(max-width:560px){.cc{flex-basis:100%!important}}
</style>
<section id="clients" class="cx">
    <div class="wrap">
        <p class="tag rv">عملاؤنا</p>
        <h2 class="ttl rv">نفخر بالعمل مع أفضل العملاء</h2>
        <p class="cx-sub rv">شركات ومؤسسات في مختلف المجالات وثقت بنا في بناء حضورها الرقمي.</p>
        <div class="csl rv" role="region" aria-roledescription="carousel" aria-label="عملاؤنا"><button class="sb pv" id="cpv" aria-label="السابق" type="button">›</button>
            <div class="ctr" id="ctr" tabindex="0"></div><button class="sb nx" id="cnx" aria-label="التالي" type="button">‹</button>
        </div>
        <div class="cdt" id="cdots"></div>
        <div class="cx-foot rv"><span>انضم إلى أكثر من <b>150</b> عميل سعيد</span><a class="btn pri" href="#contact">ابدأ مشروعك ←</a></div>
    </div>
</section>

<script>
    /* قسم العملاء - سلايدر. الاتجاه RTL يُكتشف تلقائياً.
   لتعديل العملاء: غيّر المصفوفة CL  [الاسم، المجال، مسارات SVG] */
var $=function(s,c){return(c||document).querySelector(s)},$$=function(s,c){return[].slice.call((c||document).querySelectorAll(s))};
var CL=[['SkyTech','تقنية وبرمجيات','<path d="M5 19c0-4 3-9 8-12l5-2-2 5c-3 5-8 8-11 9zM9 15l-4 4M14 10h.01"/>'],['Global Trade','تجارة واستيراد','<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18"/>'],['NextLevel','استشارات أعمال','<path d="M6 17l6-6 6 6M6 11l6-6 6 6"/>'],['Dream Home','عقارات وتطوير','<path d="M3 11l9-7 9 7v9H3zM9 20v-6h6v6"/>'],['Legal Pro','محاماة واستشارات','<path d="M12 3v18M5 7h14M5 7l-3 7a3 3 0 006 0zM19 7l-3 7a3 3 0 006 0zM8 21h8"/>'],['EduPlus','تعليم وكورسات','<path d="M2 9l10-5 10 5-10 5zM6 11v5c0 1.5 3 3 6 3s6-1.5 6-3v-5"/>'],['MediCare','رعاية صحية','<path d="M12 21s-8-5-8-11a4.5 4.5 0 018-3 4.5 4.5 0 018 3c0 6-8 11-8 11z"/>'],['Foodies','مطاعم وضيافة','<path d="M7 3v8M4 3v5a3 3 0 006 0V3M7 11v10M17 3c-2 2-3 5-3 8h3v10"/>']];
(function(){
var tr=$('#ctr'),dots=$('#cdots'),n=CL.length,PAD=4,GAP=18,reduce=matchMedia('(prefers-reduced-motion:reduce)').matches,hold=0,until=0,vis=true,pv=1,pages=1,busy=0,bt;
tr.innerHTML=CL.map(function(c,i){return '<div class="cc'+(i%2?' o':'')+'" role="group" aria-roledescription="slide" aria-label="'+(i+1)+' / '+n+'"><span class="ci"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">'+c[2]+'</svg></span><b>'+c[0]+'</b><small>'+c[1]+'</small></div>'}).join('');
var cs=$$('.cc',tr);
function rtl(){return getComputedStyle(tr).direction==='rtl'}
function edge(r){return rtl()?r.right:r.left}
function start(){return edge(tr.getBoundingClientRect())+(rtl()?-PAD:PAD)}
function cur(){var s=start(),b=0,m=1e9;cs.forEach(function(c,i){var d=Math.abs(edge(c.getBoundingClientRect())-s);if(d<m){m=d;b=i}});return b}
function maxS(){return tr.scrollWidth-tr.clientWidth}
function atStart(){return Math.abs(tr.scrollLeft)<=3}
function atEnd(){return Math.abs(tr.scrollLeft)>=maxS()-3}
function go(i){i=Math.max(0,Math.min(n-1,i));var d=edge(cs[i].getBoundingClientRect())-start();clearTimeout(bt);tr.classList.add('mv');busy=1;tr.scrollTo({left:tr.scrollLeft+d,behavior:reduce?'auto':'smooth'});bt=setTimeout(function(){tr.classList.remove('mv');busy=0;mark()},reduce?50:850)}
function next(){if(atEnd())go(0);else go(Math.min(cur()+pv,n-pv))}
function prev(){if(atStart())go(n-pv);else go(Math.max(cur()-pv,0))}
function mark(){var m=maxS(),p=m>3?Math.min(Math.abs(tr.scrollLeft)/m,1):0,k=Math.round(p*(pages-1));$$('button',dots).forEach(function(b,i){b.classList.toggle('on',i===k);b.setAttribute('aria-current',i===k?'true':'false')})}
function build(){pv=Math.max(1,Math.round((tr.clientWidth+GAP)/(cs[0].getBoundingClientRect().width+GAP)));pages=Math.max(1,Math.ceil(n/pv));dots.innerHTML='';for(var k=0;k<pages;k++)(function(k){var b=document.createElement('button');b.type='button';b.setAttribute('aria-label','المجموعة '+(k+1)+' من '+pages);b.onclick=function(){until=Date.now()+8000;go(Math.round(k*(n-pv)/Math.max(pages-1,1)))};dots.appendChild(b)})(k);dots.style.display=pages>1?'flex':'none';mark()}
$('#cnx').onclick=function(){until=Date.now()+8000;next()};$('#cpv').onclick=function(){until=Date.now()+8000;prev()};
tr.addEventListener('scroll',function(){if(!busy)mark()},{passive:true});
tr.addEventListener('keydown',function(e){if(e.key==='ArrowLeft'){e.preventDefault();rtl()?next():prev()}else if(e.key==='ArrowRight'){e.preventDefault();rtl()?prev():next()}});
/* mouse drag (touch uses native scrolling) */
var dn=0,sx=0,s0=0;
tr.addEventListener('pointerdown',function(e){until=Date.now()+8000;if(e.pointerType!=='mouse'||e.button)return;clearTimeout(bt);busy=0;tr.classList.remove('mv');dn=1;sx=e.clientX;s0=tr.scrollLeft;tr.classList.add('dg')});
addEventListener('pointermove',function(e){if(dn)tr.scrollLeft=s0-(e.clientX-sx)});
function endDrag(){if(!dn)return;dn=0;tr.classList.remove('dg');go(cur())}
addEventListener('pointerup',endDrag);addEventListener('pointercancel',endDrag);
tr.addEventListener('dragstart',function(e){e.preventDefault()});
tr.addEventListener('touchstart',function(){until=Date.now()+8000;clearTimeout(bt);busy=0;tr.classList.remove('mv')},{passive:true});
/* snap back to the nearest card when a touch scroll ends */
var st;tr.addEventListener('scroll',function(){clearTimeout(st);st=setTimeout(function(){if(!dn&&!busy)mark()},120)},{passive:true});
var box=tr.parentNode;
box.addEventListener('mouseenter',function(){hold=1});box.addEventListener('mouseleave',function(){hold=0});box.addEventListener('focusin',function(){until=Date.now()+8000});
if('IntersectionObserver' in window)new IntersectionObserver(function(e){vis=e[0].isIntersecting}).observe(box);
if(!reduce)setInterval(function(){if(!hold&&vis&&!document.hidden&&!dn&&Date.now()>until)next()},4500);
addEventListener('resize',function(){build()});
build();
})();

/* ظهور تدريجي عند السكرول (اختياري) */
var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.15});
$$('.rv').forEach(function(e){io.observe(e)});
</script>