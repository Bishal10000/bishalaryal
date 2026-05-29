<link rel="stylesheet" href="/css/carousel.css">

<div class="vscode-carousel-inline">
  <div class="vscode-carousel-shell">
    <div class="ph">
      <div class="brand">
        <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><rect x=".75" y=".75" width="12.5" height="12.5" rx="2.5" stroke="#00c8ff" stroke-width="1.4"/><path d="M3.5 7l2.5 2.5L10 4.5" stroke="#00c8ff" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Programming Pro
      </div>
      <h1>VS Code Extensions Carousel</h1>
      <p>5 slides · 540 × 540 · Facebook / Instagram ready</p>
    </div>

    <div class="cw">
      <div class="ct">
        <div class="sc" data-vscode-track>
          <div class="slide s1">
            <div class="code-bg">import { useState, useEffect } from 'react';const Editor = ({ file, theme }) => {  const [code, setCode] = useState('');  const [errors, setErrors] = useState([]);  useEffect(() => {    lintCode(code).then(setErrors);  }, [code]);  return <div className="editor">...</div>;};
function formatCode(src, opts) {  const parser = opts.parser || 'babel';  return prettier.format(src, { parser, ...opts });}
const gitBlame = async (file, line) => {  const res = await git.log({ file, line });  return res.latest;};
export default Editor;</div>
            <div class="orb"></div>
            <div class="cl"></div><div class="cr"></div><div class="sn">01 / 05</div>
            <div class="vsc-logo"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M17.5 2L7 13.5l-4-3L1 12l2.5 2.5L1 17l1.5 1.5 3.5-1.5L17.5 22 23 19V5L17.5 2z" fill="white" opacity="0.9"/></svg></div>
            <div class="eye">// 3 extensions picked ·</div>
            <h2>VS Code Extensions that make coding <span class="hl">easier</span> 👇</h2>
            <p class="sub">Boost your dev workflow · Zero config needed</p>
            <div class="pr"><span class="pill pb">Error Lens</span><span class="pill pg">Prettier</span><span class="pill pp">GitLens</span></div>
            <div class="bs"><div class="bd"></div>Programming Pro<div class="bd"></div></div>
          </div>

          <div class="slide s2">
            <div class="cl"></div><div class="cr"></div><div class="sn">02 / 05</div>
            <div class="eh"><span class="en">01</span><span style="font-family:'JetBrains Mono',monospace;font-size:10px;color:var(--tf)">vscode ext</span></div>
            <div class="etitle">Error Lens</div>
            <div class="edesc">Shows errors &amp; warnings directly inline<br>as you write — zero context switching.</div>
            <div class="tags"><span class="pill pr">easier debugging</span><span class="pill pb">cleaner workflow</span></div>
            <div class="ed" style="flex:1">
              <div class="ebar"><div class="edots"><span class="er"></span><span class="ey"></span><span class="eg"></span></div><div class="etab">app.js</div></div>
              <div class="ebody">
                <div class="cl2"><span class="ln">1</span><span class="cc"><span class="kw">const</span> <span class="fn">fetchUser</span> <span class="pu">=</span> <span class="kw">async</span> <span class="pu">(</span><span class="vr">id</span><span class="pu">)</span> <span class="pu">=&gt;</span> <span class="pu">{</span></span></div>
                <div class="cl2 lerr"><span class="ln">2</span><span class="cc"><span class="kw">  const</span> <span class="vr">res</span> <span class="pu">=</span> <span class="kw">await</span> <span class="fn sq-r">fetch</span><span class="pu">(</span><span class="str">'/api/user'</span><span class="pu">,</span> <span class="vr">id</span><span class="pu">)</span></span><span class="erri">⊘ Expected 1 arg, got 2</span></div>
                <div class="cl2 lwrn"><span class="ln">3</span><span class="cc"><span class="kw">  const</span> <span class="vr sq-o">data</span> <span class="pu">=</span> <span class="kw">await</span> <span class="vr">res</span><span class="pu">.</span><span class="fn">json</span><span class="pu">()</span></span><span class="wrni">⚠ 'data' is declared but never read</span></div>
                <div class="cl2 lerr"><span class="ln">4</span><span class="cc"><span class="kw">  return</span> <span class="fn sq-r">res</span><span class="pu">.</span><span class="pr2">user</span></span><span class="erri">⊘ Property 'user' does not exist</span></div>
                <div class="cl2"><span class="ln">5</span><span class="cc"><span class="pu">}</span></span></div>
                <div class="cl2"><span class="ln">6</span><span class="cc"></span></div>
                <div class="cl2"><span class="ln">7</span><span class="cc"><span class="kw">const</span> <span class="vr">userId</span> <span class="pu">=</span> <span class="nu">42</span></span></div>
                <div class="cl2"><span class="ln">8</span><span class="cc"><span class="fn">fetchUser</span><span class="pu">(</span><span class="vr">userId</span><span class="pu">)</span><span class="pu">.</span><span class="fn">then</span><span class="pu">(</span><span class="fn">console</span><span class="pu">.</span><span class="vr">log</span><span class="pu">)</span></span></div>
              </div>
            </div>
            <div class="bs"><div class="bd"></div>Programming Pro<div class="bd"></div></div>
          </div>

          <div class="slide s3">
            <div class="cl"></div><div class="cr"></div><div class="sn">03 / 05</div>
            <div class="eh" style="position:relative;z-index:2;margin-bottom:6px"><span class="en">02</span><span style="font-family:'JetBrains Mono',monospace;font-size:10px;color:var(--tf)">vscode ext</span></div>
            <div class="etitle" style="position:relative;z-index:2">Prettier</div>
            <div class="edesc" style="position:relative;z-index:2;margin-bottom:12px">Automatically formats messy code on save.<br>One tool, consistent style across your project.</div>
            <div class="tags"><span class="pill pg">saves time</span><span class="pill pb">clean code instantly</span></div>
            <div class="ba">
              <div><div class="bal bal-b">✕ Before</div><div class="ed"><div class="ebar" style="gap:5px"><div class="edots"><span class="er"></span><span class="ey"></span><span class="eg"></span></div><div class="etab" style="font-size:9px">messy.js</div></div><div class="ebody" style="font-size:9.5px"><div class="cl2"><span class="ln">1</span><span class="cc"><span class="kw">const</span> <span class="vr">x</span><span class="pu">=</span><span class="pu">{</span><span class="pr2">a</span><span class="pu">:</span><span class="nu">1</span><span class="pu">,</span><span class="pr2">b</span><span class="pu">:</span><span class="nu">2</span><span class="pu">}</span></span></div><div class="cl2"><span class="ln">2</span><span class="cc"><span class="kw">function</span> <span class="fn">foo</span><span class="pu">(</span><span class="vr">a</span><span class="pu">,</span><span class="vr">b</span><span class="pu">,</span><span class="vr">c</span><span class="pu">)</span><span class="pu">{</span></span></div><div class="cl2"><span class="ln">3</span><span class="cc"><span class="kw">  if</span><span class="pu">(</span><span class="vr">a</span><span class="pu">==</span><span class="nu">1</span><span class="pu">){</span><span class="kw">return</span> <span class="vr">b</span><span class="pu">+</span><span class="vr">c</span><span class="pu">}</span></span></div><div class="cl2"><span class="ln">4</span><span class="cc"><span class="kw">else</span><span class="pu">{</span><span class="kw">return</span> <span class="vr">a</span><span class="pu">}</span><span class="pu">}</span></span></div><div class="cl2"><span class="ln">5</span><span class="cc"><span class="kw">const</span> <span class="vr">arr</span><span class="pu">=[</span><span class="nu">1</span><span class="pu">,</span><span class="nu">2</span><span class="pu">,</span><span class="nu">3</span><span class="pu">]</span></span></div><div class="cl2"><span class="ln">6</span><span class="cc"><span class="vr">arr</span><span class="pu">.</span><span class="fn">map</span><span class="pu">(</span><span class="vr">x</span><span class="pu">=&gt;</span><span class="vr">x</span><span class="pu">*</span><span class="nu">2</span><span class="pu">)</span></span></div></div></div></div>
              <div class="arr-mid"><div class="arr-badge">→</div></div>
              <div><div class="bal bal-a">✓ After</div><div class="ed"><div class="ebar" style="gap:5px"><div class="edots"><span class="er"></span><span class="ey"></span><span class="eg"></span></div><div class="etab" style="font-size:9px">formatted.js</div></div><div class="ebody" style="font-size:9.5px"><div class="cl2"><span class="ln">1</span><span class="cc"><span class="kw">const</span> <span class="vr">x</span> <span class="pu">=</span> <span class="pu">{</span> <span class="pr2">a</span><span class="pu">:</span> <span class="nu">1</span><span class="pu">,</span> <span class="pr2">b</span><span class="pu">:</span> <span class="nu">2</span> <span class="pu">};</span></span></div><div class="cl2"><span class="ln">2</span><span class="cc"></span></div><div class="cl2"><span class="ln">3</span><span class="cc"><span class="kw">function</span> <span class="fn">foo</span><span class="pu">(</span><span class="vr">a</span><span class="pu">,</span> <span class="vr">b</span><span class="pu">,</span> <span class="vr">c</span><span class="pu">)</span> <span class="pu">{</span></span></div><div class="cl2"><span class="ln">4</span><span class="cc"><span class="kw">  if</span> <span class="pu">(</span><span class="vr">a</span> <span class="pu">===</span> <span class="nu">1</span><span class="pu">)</span> <span class="pu">{</span></span></div><div class="cl2"><span class="ln">5</span><span class="cc"><span class="kw">    return</span> <span class="vr">b</span> <span class="pu">+</span> <span class="vr">c</span><span class="pu">;</span></span></div><div class="cl2"><span class="ln">6</span><span class="cc"><span class="pu">  }</span> <span class="kw">return</span> <span class="vr">a</span><span class="pu">;</span></span></div></div></div></div>
            </div>
            <div class="bs"><div class="bd"></div>Programming Pro<div class="bd"></div></div>
          </div>

          <div class="slide s4">
            <div class="cl"></div><div class="cr"></div><div class="sn">04 / 05</div>
            <div class="eh" style="position:relative;z-index:2;margin-bottom:6px"><span class="en">03</span><span style="font-family:'JetBrains Mono',monospace;font-size:10px;color:var(--tf)">vscode ext</span></div>
            <div class="etitle" style="position:relative;z-index:2">GitLens</div>
            <div class="edesc" style="position:relative;z-index:2;margin-bottom:11px">Supercharges Git inside VS Code — see who<br>changed what, and exactly when.</div>
            <div class="tags"><span class="pill pp">commit history</span><span class="pill pg">better version control</span></div>
            <div class="ed" style="position:relative;z-index:2">
              <div class="ebar"><div class="edots"><span class="er"></span><span class="ey"></span><span class="eg"></span></div><div class="etab">auth.ts</div></div>
              <div class="ebody" style="font-size:10.5px">
                <div class="gline"><div class="gblame"><span class="gba">alex</span><span class="gbd">2 days ago</span></div><div class="gdiv"></div><div class="cdot cd-g"></div><span class="cc"><span class="kw">import</span> <span class="pu">{</span> <span class="vr">jwt</span> <span class="pu">}</span> <span class="kw">from</span> <span class="str">'jsonwebtoken'</span></span></div>
                <div class="gline ghi"><div class="gblame"><span class="gba">maya</span><span class="gbd">3 hrs ago</span></div><div class="gdiv"></div><div class="cdot cd-b"></div><span class="cc"><span class="kw">export async function</span> <span class="fn">login</span><span class="pu">(</span><span class="vr">email</span><span class="pu">:</span> <span class="ty">string</span><span class="pu">)</span> <span class="pu">{</span></span></div>
                <div class="gline ghi"><div class="gblame"><span class="gba">maya</span><span class="gbd">3 hrs ago</span></div><div class="gdiv"></div><div class="cdot cd-b"></div><span class="cc"><span class="kw">  const</span> <span class="vr">user</span> <span class="pu">=</span> <span class="kw">await</span> <span class="fn">findUser</span><span class="pu">(</span><span class="vr">email</span><span class="pu">)</span></span></div>
                <div class="gline"><div class="gblame"><span class="gba">alex</span><span class="gbd">1 day ago</span></div><div class="gdiv"></div><div class="cdot cd-o"></div><span class="cc"><span class="kw">  const</span> <span class="vr">token</span> <span class="pu">=</span> <span class="vr">jwt</span><span class="pu">.</span><span class="fn">sign</span><span class="pu">(</span><span class="vr">user</span><span class="pu">.</span><span class="pr2">id</span><span class="pu">,</span> <span class="vr">SECRET</span><span class="pu">)</span></span></div>
                <div class="gline"><div class="gblame"><span class="gba">alex</span><span class="gbd">1 day ago</span></div><div class="gdiv"></div><div class="cdot cd-o"></div><span class="cc"><span class="kw">  return</span> <span class="pu">{</span> <span class="pr2">token</span><span class="pu">,</span> <span class="pr2">user</span> <span class="pu">}</span></span></div>
                <div class="gline"><div class="gblame"><span class="gba">sam</span><span class="gbd">5 days ago</span></div><div class="gdiv"></div><div class="cdot cd-p"></div><span class="cc"><span class="pu">}</span></span></div>
              </div>
            </div>
            <div class="cstrip"><div class="cstrip-title">⎇ Recent Commits</div><div class="ci"><div class="cdot cd-b" style="width:5px;height:5px"></div><span class="ch">a3f9c2</span><span class="cm2">feat: add JWT refresh token logic</span><span class="ct2">3h ago</span></div><div class="ci"><div class="cdot cd-o" style="width:5px;height:5px"></div><span class="ch">8d12e7</span><span class="cm2">fix: resolve token expiry edge case</span><span class="ct2">1d ago</span></div><div class="ci"><div class="cdot cd-p" style="width:5px;height:5px"></div><span class="ch">f77b04</span><span class="cm2">refactor: extract auth middleware</span><span class="ct2">5d ago</span></div></div>
            <div class="bs"><div class="bd"></div>Programming Pro<div class="bd"></div></div>
          </div>

          <div class="slide s5">
            <div class="rings2"></div><div class="rings"></div><div class="orb2"></div><div class="cl"></div><div class="cr"></div><div class="sn">05 / 05</div>
            <div class="mt">small <span class="aw">tools</span>,<br>huge difference.</div><div class="divl"></div><div class="cta">Save this for later 🔖</div>
            <div class="recap"><span class="pill pr">Error Lens</span><span class="pill pg">Prettier</span><span class="pill pp">GitLens</span></div>
            <div class="bf"><div class="dn"></div><span>Programming Pro</span><div class="dn"></div></div>
          </div>
        </div>
      </div>
    </div>

    <div class="nav">
      <button class="nb" type="button" data-vscode-prev>←</button>
      <div class="dns" data-vscode-dots></div>
      <button class="nb" type="button" data-vscode-next>→</button>
    </div>
    <div class="sc2" data-vscode-counter>Slide 1 of 5</div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('[data-vscode-carousel-root]');
    if (!carousel) return;

    const track = carousel.querySelector('[data-vscode-track]');
    const slides = Array.from(track.children);
    const prev = carousel.querySelector('[data-vscode-prev]');
    const next = carousel.querySelector('[data-vscode-next]');
    const dots = carousel.querySelector('[data-vscode-dots]');
    const counter = carousel.querySelector('[data-vscode-counter]');
    let index = 0;

    const renderDots = () => {
      if (!dots) return;
      dots.innerHTML = '';
      slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = `dn2${i === index ? ' active' : ''}`;
        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
        dot.addEventListener('click', () => update(i));
        dots.appendChild(dot);
      });
    };

    const update = (nextIndex) => {
      index = (nextIndex + slides.length) % slides.length;
      track.style.transform = `translateX(-${index * 100}%)`;
      if (counter) counter.textContent = `Slide ${index + 1} of ${slides.length}`;
      renderDots();
    };

    prev?.addEventListener('click', () => update(index - 1));
    next?.addEventListener('click', () => update(index + 1));
    document.addEventListener('keydown', (event) => {
      if (event.key === 'ArrowRight') update(index + 1);
      if (event.key === 'ArrowLeft') update(index - 1);
    });

    update(0);
  });
</script>