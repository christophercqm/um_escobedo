<template>
    <div>
        <div id="pointer-ring"></div>
        <div id="pointer-dot"></div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.initPointer({
            pointerColor: "#f1f1f1",
            ringSize: 25,
            ringClickSize: 20,
        });
    },
    methods: {
        initPointer(options) {
            const pointer = document.getElementById("pointer-dot");
            const ring = document.getElementById("pointer-ring");

            let mouseX = -100;
            let mouseY = -100;
            let ringX = -100;
            let ringY = -100;
            let mouseDown = false;

            window.onmousemove = (mouse) => {
                mouseX = mouse.clientX;
                mouseY = mouse.clientY;
            };

            window.onmousedown = () => {
                mouseDown = true;
            };

            window.onmouseup = () => {
                mouseDown = false;
            };

            const trace = (a, b, n) => (1 - n) * a + n * b;

            const getOption = (option) => {
                const defaultObj = {
                    pointerColor: "#f1f1f1",
                    ringSize: 25,
                    ringClickSize: (options.ringSize || 15) - 5,
                };
                return options[option] === undefined
                    ? defaultObj[option]
                    : options[option];
            };

            const render = () => {
                ringX = trace(ringX, mouseX, 0.2);
                ringY = trace(ringY, mouseY, 0.2);

                pointer.style.borderColor = getOption("pointerColor");
                ring.style.borderColor = getOption("pointerColor");
                ring.style.padding = mouseDown
                    ? `${getOption("ringClickSize")}px`
                    : `${getOption("ringSize")}px`;

                pointer.style.transform = `translate(${mouseX}px, ${mouseY}px)`;
                ring.style.transform = `translate(${
                    ringX -
                    (mouseDown
                        ? getOption("ringClickSize")
                        : getOption("ringSize"))
                }px, ${
                    ringY -
                    (mouseDown
                        ? getOption("ringClickSize")
                        : getOption("ringSize"))
                }px)`;

                requestAnimationFrame(render);
            };

            requestAnimationFrame(render);
        },
    },
};
</script>

<style scoped>
#pointer-dot {
  left: 0;
  top: 0;
  margin-top: -.5rem;
  margin-left: -.3rem;
  width: 0;
  height: 0;
  border: 2.5px solid #b29a7b;
  position: fixed;
  border-radius: .4rem;
  pointer-events: none;
  transition: border-color 0.5s;
  z-index: 9999; }

#pointer-ring {
  left: 0;
  top: 0;
  width: 0;
  height: 0;
  padding: 1.5rem;
  border: .2rem solid #f1f1f1;
  position: fixed;
  border-radius: 10rem;
  pointer-events: none;
  z-index: 9999; }
</style>
