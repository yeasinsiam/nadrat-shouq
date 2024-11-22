import Layout from "@/components/layout";
import { SWRConfig } from "swr";
import axios from "@/utils/axios";
import NextNProgress from "nextjs-progressbar";

import "@/styles/globals.css";

export default function App({ Component, pageProps }) {
  return (
    <SWRConfig
      value={{
        fetcher: (url) => axios.get(url).then((res) => res.data),
        keepPreviousData: true,
        fallback: pageProps.fallback,
        revalidateOnFocus: false,
      }}
    >
      <NextNProgress
        color="#52525b"
        startPosition={0.3}
        stopDelayMs={200}
        height={3.5}
        showOnShallow={true}
        options={{ showSpinner: false }}
      />
      <Layout>
        <Component {...pageProps} />{" "}
      </Layout>
    </SWRConfig>
  );
}
