import { Html, Head, Main, NextScript } from "next/document";
import Script from "next/script";

export default function Document() {
  return (
    <Html lang="en" className="scroll-smooth">
      <Head>
        {/* Favicon link starts */}
        <link
          rel="apple-touch-icon"
          sizes="180x180"
          href="/apple-touch-icon.png"
        />
        <link
          rel="icon"
          type="image/png"
          sizes="32x32"
          href="/favicon-32x32.png"
        />
        <link
          rel="icon"
          type="image/png"
          sizes="16x16"
          href="/favicon-16x16.png"
        />
        <link rel="manifest" href="/site.webmanifest" />
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />
        {/* Favicon link ends */}
        <link rel="preconnect" href="//fonts.googleapis.com" />
        <link rel="preconnect" href="//fonts.gstatic.com" crossOrigin="true" />
        <link
          href="//fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
          rel="stylesheet"
        />
        {/* SEO Meta */}
        <meta
          name="description"
          content="Experience the beauty and craftsmanship of Nadrat Shouq Establishment furniture - The greatest furniture manufacture company in Saudi Arabia. Order furniture for your home online."
        />
      </Head>
      <body className="selection:bg-zinc-700 selection:text-white text-zinc-900 border-zinc-200">
        <Main />
        <NextScript />
        <Script
          strategy="beforeInteractive"
          src="//cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"
        />
        <Script
          strategy="beforeInteractive"
          src="//cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js"
        />
      </body>
    </Html>
  );
}
